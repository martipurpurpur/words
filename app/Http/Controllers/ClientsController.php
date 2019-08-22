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
}
