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
        return view('EO.eo-ticket.ticket-categories.tc-create',compact('ticket'));
    }

    public function store($id,Request $request)
    {
     
        $file = $request->file('e_ticket');
        $filename = $file->getClientOriginalName();
       
        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "ETicket";
        
        //uploaded file
        $file->move($location, $request->ticket_category.'-'.$filename);

        
        $ticket = Ticket::with(['Venues','Artists'])->find($id);
        $ticketCategoryAttr = [];
        $ticketCategoryAttr['id_ticket'] = $ticket->id_ticket; 
        $ticketCategoryAttr['ticket_price'] = $request->ticket_price;
        $ticketCategoryAttr['ticket_category'] = $request->ticket_category;
        $ticketCategoryAttr['e_ticket'] = $request->ticket_category.'-'.$filename;

      
        $createTicketCategory = TicketCategory::create($ticketCategoryAttr);

        if(!$createTicketCategory) {
            Alert::error('Whoops', 'Something error');
            return redirect()->refresh();

        } else {
            Alert::success('Success', 'New ticket category added');
            return redirect()->route('eo.ticket.show',['id'=>$id]);

        }

    }
}
