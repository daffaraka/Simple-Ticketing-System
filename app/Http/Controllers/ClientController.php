<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $ticket = Ticket::all();
        
        return view('client.index',compact('ticket'));
    }

    public function showTicket($id)
    {
        $ticket = Ticket::find($id);
        
        return view('client.show-ticket',compact('ticket'));
    }

    public function order($id)
    {
        $ticket = Ticket::with(['Venues','Artists'])->find($id);
        
        return view('client.order-ticket',compact('ticket'));
    }
}
