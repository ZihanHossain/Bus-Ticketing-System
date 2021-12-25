<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Place;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerDashboard extends Controller
{
    function index()
    {
        $places = Place::all();
        $buses = Bus::all();
        $ticket = Ticket::all();
        $user = User::where('post', 'driver')->get();

        $tickets = [];
        $users = [];

        foreach($ticket as $tic)
        {
            $tic->from = Place::where('id', $tic['from'])->value('name');
            $tic->to = Place::where('id', $tic['to'])->value('name');
            $tic->b_id = Bus::where('id', $tic['b_id'])->value('name');

            array_push($tickets, $tic);
        }
        
        foreach($user as $use)
        {
            $use->bus = Bus::where('d_id', $use['id'])->value('name');

            array_push($users, $use);
        }

        return view('manager_dashboard')
            ->with('places', $places)
            ->with('tickets', $tickets)
            ->with('drivers', $user)
            ->with('buses', $buses);
    }
}
