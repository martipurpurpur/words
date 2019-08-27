<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }

    public function store(Request $request)
    {
        $client = new Client(); //создаем объект класса фрэндлист
        $client->fill($request->only(['fullname', 'city']));
        $client->save();
        return redirect(route('clients'));
    }
    public function delete($client_id)
    {
        $client = Client::find($client_id);
        $client->delete();
        return redirect(route('clients'));
    }

    public function edit($client_id)
    {
        $client = Client::find($client_id);
        return view('clients.edit', compact('client', $client));
    }

    public function update(Request $request, $client_id)
    {
        $request->validate([
            'fullname' => 'required|min:3',
            'city' => 'required',
        ]);
        $client = Client::find($client_id);

        $client->fullname = $request->get('fullname');
        $client->city = $request->get('city');
        $client->save();
        return redirect(route('clients'));
    }
}
