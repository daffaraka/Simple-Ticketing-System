<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TicketCategoryController extends Controller
{
    public function index()
    {
        
        return view('admin.dashboard.ticket.ticket-categories.tc-index');
    }

    public function create($id,Request $request)
    {
        $ticket = Ticket::with(['Venues','Artists'])->find($id);
        return view('admin.dashboard.ticket.ticket-categories.tc-create',compact('ticket'));
    }

    public function store($id,Request $request)
    {
     
      
        $ticket = Ticket::with(['Venues','Artists'])->find($id);
        $ticketCategoryAttr = [];
        $ticketCategoryAttr['id_ticket'] = $ticket->id_ticket; 
        $ticketCategoryAttr['ticket_price'] = $request->ticket_price;
        $ticketCategoryAttr['ticket_category'] = $request->ticket_category;
        
      
        $createTicketCategory = TicketCategory::create($ticketCategoryAttr);

        if(!$createTicketCategory) {
            return redirect()->refresh()->alert()->failed('Error', 'Cannot add ticket category');;

        } else {
            Alert::success('Success', 'New ticket category added');
            return redirect()->route('ticket.show',['id'=>$id]);

        }

    }
}
