<?php

namespace App\Http\Controllers;

use App\Events\ClientHired;
use App\Events\PositionCreated;
use App\Models\Client;
use App\Models\Company;
use App\Models\Position;
use App\Services\CompanyBudgetCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        private CompanyBudgetCalculator $budgetCalculator,
    ) { }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::with(['company', 'client'])->get();

        return view('positions.list', ['positions' => $positions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::select('id', 'name')->get();

        return view('positions.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company'   => 'required|numeric|not_in:0',
            'role'      => 'required|min:2',
            'years_exp' => 'required|numeric',
            'salary'    => 'required|numeric',
        ]);

        $company = Company::find($request->company);

        $validator->after(function ($validator) use ($request, $company) {

            if ($company) {
                $companyHasBudget = $this->budgetCalculator->hasEnoughBudgetForNewPositions($company, $request->salary);

                if (!$companyHasBudget) {
                    $validator->errors()->add(
                        'company', 'Company does not have enough budget!',
                    );
                }
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $position = new Position;

        $position->role = $request->role;
        $position->years_exp_req = $request->years_exp;
        $position->salary = $request->salary;
        $position->company()->associate($company);

        $position->save();

        PositionCreated::dispatch($company);

        return redirect()->route('positions.index')->with('success', 'Position was created!');
    }

    /**
     * Hire a client for a given position.
     */
    public function hire(Request $request, Position $position)
    {
        $validator = Validator::make($request->all(), [
            'client' => 'required|numeric|not_in:0',
        ]);

        $validator->after(function ($validator) use ($request) {

            $isClientAvailable = Client::whereId($request->client)
                        ->whereDoesntHave('position')
                        ->count() > 0;

            if (!$isClientAvailable) {
                $validator->errors()->add(
                    'client', 'Client is not available!'
                );
            }
        });

        $validator->after(function ($validator) use ($position) {

            $companyHasBudget = $this->budgetCalculator->hasEnoughBudgetToHire($position->company, $position->salary);

            if (!$companyHasBudget) {
                $validator->errors()->add(
                    'company', 'Company does not have enough budget!',
                );
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        $client = Client::find($request->client);

        $position->client()->associate($client);

        $position->save();

        ClientHired::dispatch($position->company);

        return redirect()->route('companies.show', $position->company)->with('success', 'Client was hired!');
    }
}
