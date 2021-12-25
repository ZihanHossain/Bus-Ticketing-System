<?php

namespace App\Http\Controllers;

use App\Models\Place as ModelsPlace;
use Illuminate\Http\Request;

class Place extends Controller
{
    function add_place(Request $request)
    {
        $place = new ModelsPlace();

        $place->name = $request->input('place_name');

        $place->save();
        
        return ['success' => true];
    }

    function get_place()
    {
        $place = ModelsPlace::latest()->first();

        return $place;
    }
}
