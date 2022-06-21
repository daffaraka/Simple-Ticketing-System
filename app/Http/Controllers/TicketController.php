<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Ticket;
use App\Models\Venue;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class TicketController extends Controller
{
    
    public function index()
    {
        $ticket = Ticket::with(['Venues','Artists'])->get();
        return view('admin.dashboard.ticket.ticket-index',compact('ticket'));
    }

   
    public function create()
    {
        $venue = Venue::all();
        $artist = Artist::all();
        return view('admin.dashboard.ticket.ticket-create',compact(['venue','artist']));
    }

  
    public function store(Request $request)
    {

        
        $file = $request->file('ticket_image');
        $filename = $file->getClientOriginalName();
       
        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "ticket_image";
        
        //uploaded file
        $file->move($location, $request->ticket_name.'-'.$filename);

      
        $ticketAttribute = [];
        $ticketAttribute['id_artist'] = $request->artist;
        $ticketAttribute['id_venue'] = $request->venue;
        $ticketAttribute['ticket_price'] = $request->ticket_price;
        $ticketAttribute['ticket_name'] = $request->ticket_name;
        $ticketAttribute['ticket_price'] = $request->ticket_price;
        $ticketAttribute['concert_date'] = $request->concert_date;
        $ticketAttribute['ticket_stock'] = $request->ticket_stock;
        $ticketAttribute['ticket_type'] = $request->ticket_type;
        $ticketAttribute['ticket_image'] = $request->ticket_name.'-'.$filename;

        $ticketCreate =  Ticket::create($ticketAttribute);

        if(!$ticketCreate) {
            Alert::error('Error Message', 'Optional Title');
            return redirect()->route('ticket.create');
        } else {
            Alert::success('Success Message', 'Optional Title');
            return redirect()->route('ticket.index');
        }
    }

   
    public function show($id)
    {
        $ticket = Ticket::with(['Venues','Artists'])->find($id);
        
        return view('admin.dashboard.ticket.ticket-show',compact('ticket'));
    }

   
    public function edit(Ticket $ticket)
    {
        //
    }


    public function update(Request $request, Ticket $ticket)
    {
        //
    }

   
    public function destroy($id)
    {
        $ticket = Ticket::where('id_venue',$id)->first();
        if ($ticket != null) {
            $ticket->delete(public_path('ticket',$ticket->ticket_image));
            $ticket->delete();
            return redirect()->route('ticket.index')->alert()->success('Deleted!', 'Ticket been deleted');;
        }
        return redirect()->refresh();
    }
}
