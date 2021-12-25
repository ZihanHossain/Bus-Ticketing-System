<?php

namespace App\Http\Controllers;

use App\Models\Ticket as ModelsTicket;
use Illuminate\Http\Request;

class Ticket extends Controller
{
    function add_ticket(Request $request)
    {
        $ticket = new ModelsTicket();

        $ticket->from = $request->input('from');
        $ticket->to = $request->input('to');
        $ticket->fare = $request->input('fare');
        $ticket->b_id = $request->input('b_id');

        $ticket->save();

        return ['success' => true];
    }

    function get_ticket()
    {
        $ticket = ModelsTicket::latest()->first();

        return $ticket;
    }
}
