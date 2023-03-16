<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   
    public function index()
    {
        return Client::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'lastname'=>'required'
        ]);
        $client = new Client;
        $client -> name =$request->input('name');
        $client -> lastname = $request->input('lastname');
        $client -> save();
        return $client;
    }

    
    public function show(Client $client)
    {
        return $client;
    }

    
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=> 'required',
            'lastname'=>'required'
        ]);

        $client -> name =$request->input('name');
        $client -> lastname = $request->input('lastname');
        $client -> update();

        return $client;
    }

    
    public function destroy($id)
    {
        $client = Client::find($id);
        if (is_null($client)) {
            return response()->json('No se pudo realizar correctamente la operacion ', 404);
        }
        $client -> delete();
        return response()->noContent();
    }
}
