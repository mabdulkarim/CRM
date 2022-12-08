<?php

namespace App\Services;

use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientService
{
    public function requestHasLogoFile(StoreClientRequest|UpdateClientRequest $request, Client $client): void
    {
        if ($request->hasFile('logo')) {
            $client->clearMediaCollection('logos');
            $client->addMediaFromRequest('logo')
                ->toMediaCollection('logos');
        }
    }
}
