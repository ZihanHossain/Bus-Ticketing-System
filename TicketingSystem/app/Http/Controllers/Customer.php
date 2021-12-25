<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\ConfirmedTicket;
use App\Models\Place;
use App\Models\Ticket;
use Illuminate\Http\Request;

class Customer extends Controller
{
    function index()
    {
        $places = Place::all();

        return view('customer_dashboard')->with('places', $places);
    }

    function ticket_confirmation($data)
    {
        $places = Place::find($data['from']);


        return view('ticket_confirmation')->with('data', $places['name']);
    }

    function ticket_search(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $journey_date = $request->journey_date;
        $ticket_amount = $request->ticket_amount;

        $ticket = Ticket::where('from', $from)->where('to', $to)->first();

        if($ticket)
        {
            $booked_ticket = ConfirmedTicket::where('t_id', $ticket['id'])->where('journey_date', $journey_date)->first();
            if($booked_ticket)
            {
                if($booked_ticket['count'] < 40-$ticket_amount)
                {
                    // $booked_ticket->update(array('count' => 1));
                    // $booked_ticket->count = $booked_ticket['count'] + $ticket_amount;
                    // $booked_ticket->save();
                    $from = Place::find($from);
                    $to = Place::find($to);
                    $bus = Bus::find($ticket['b_id']);
    
                    return view('ticket_confirmation')->with('from', $from['name'])
                        ->with('to', $to['name'])
                        ->with('bus', $bus['name'])
                        ->with('fare', $ticket['fare'])
                        ->with('journey_date', $booked_ticket['journey_date'])
                        ->with('message', 'ticket available');
                }
                else
                {
                    return view('ticket_confirmation')->with('message', 'no sit')  ;
                }
            }
            else
            {
                return view('ticket_confirmation')->with('message', 'ticket not confirmed');
            }
        }
        else
        {
            return 'failed';
        }
        
    }
}
