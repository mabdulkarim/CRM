<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Http\Requests\Client\StoreClientRequest;
use App\Services\ClientService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $is_active = false;

        if (in_array($request->is_active, ['true', 'false']) && $request->is_active === 'true') {
            $is_active = true;
        }

        $clients = Client::when($is_active, fn($query) => $query->isActive())->paginate(15);

        return view('clients.index', compact(['clients', 'is_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $clientInformation = $request->safe()->except(['logo']);
        $client = Client::create($clientInformation);

        (new ClientService())->requestHasLogoFile($request, $client);

        return redirect()->route('clients.index')->with('success', 'Created client successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateClientRequest  $request
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $clientInformation = $request->safe()->except(['logo']);
        $client->update($clientInformation);

        (new ClientService())->requestHasLogoFile($request, $client);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        try {
            $client->forceDelete();
        } catch (QueryException $e) {
            return redirect()->route('clients.index')->withErrors(['status' => 'Can\'t delete client. Delete the project that is associated with this client first.']);
        }

        return redirect()->route('clients.index');
    }
}
