<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class User extends Controller
{
    function add_driver(Request $request)
    {
        $user = new ModelsUser();

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->post = 'driver';

        $user->save();
        
        if($request->b_id != null)
        {
            $d_id = ModelsUser::where('email', $request->input('email'))->first();

            Bus::where('id', $request->input('b_id'))->update(['d_id' => $d_id['id']]);
        }

        return['success' => false];
        // return redirect('/');
    }

    function get_driver()
    {
        $user = ModelsUser::where('post', 'driver')->latest()->first();

        $bus = Bus::where('d_id', $user['id'])->first();

        $user->email = $bus['name']; //replacing email for bus name. Dont want to add another variable into the array

        return $user;
    }
}
