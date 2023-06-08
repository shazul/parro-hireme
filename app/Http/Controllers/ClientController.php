<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with(['position'])->get();

        return view('clients.list', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $client = new Client;

        $client->name = $request->client_name;
        $client->birth_date = $request->birth_date;
        $client->education_level = $request->education_level;

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client was created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if (isset($client->position)) {
            return redirect()->back()->with('error', 'Client is already hired. Can\'t be deleted!');
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client was deleted!');
    }
}
