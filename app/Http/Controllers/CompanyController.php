<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Client;
use App\Models\Company;
use App\Models\Position;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.list', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = new Company;

        $company->name = $request->company_name;
        $company->address = $request->address;
        $company->zip_code = $request->zipcode;
        $company->budget = $request->budget;

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        $company->load(['positions.client']);

        $openPositions = $company->positions->filter(function (Position $value, int $key) {
            return $value->client_id === null;
        });

        $occupiedPositions = $company->positions->diff($openPositions);

        $availableClients = Client::doesntHave('position')->get();

        return view('companies.detail', compact('company', 'openPositions', 'occupiedPositions', 'availableClients'));
    }
}
