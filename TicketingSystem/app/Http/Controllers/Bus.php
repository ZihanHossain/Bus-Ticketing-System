<?php

namespace App\Http\Controllers;

use App\Models\Bus as ModelsBus;
use Illuminate\Http\Request;

class Bus extends Controller
{
    function add_bus(Request $request)
    {
        $bus = new ModelsBus();

        $bus->name = $request->input('bus_name');

        $bus->save();
        
        return ['success' => true];
    }

    function get_bus()
    {
        $bus = ModelsBus::latest()->first();

        return $bus;
    }
}
