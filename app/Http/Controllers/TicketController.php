<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Artist;
use App\Models\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class TicketController extends Controller
{
    
    public function index()
    {
        $ticket = Ticket::with(['Venues','Artists','TicketCategories','Users'])->get();
        if (request()->ajax()) {

            return DataTables::of($ticket)->addColumn('action', function ($data) {
            $button =' <a href="ticket/'.$data->id_ticket.' " data-toggle="tooltip"  data-id="' . $data->id_ticket . '" data-original-title="Show" class="show btn btn-success px-3 show-post"><i class="far fa-edit"></i> Show Detail</a>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<a href="ticket/edit/'.$data->id_ticket.' " data-toggle="tooltip"  data-id="' . $data->id_ticket . '" data-original-title="Edit" class="edit btn btn-sm btn-warning edit-post"><i class="far fa-edit"></i> Edit</a>';
                // $button .= '&nbsp;&nbsp;';
                // $button .= '<a href="ticket/delete/'.$data->id_ticket.'" name="delete" id="' . $data->id_ticket . '" class="delete btn btn-sm btn-danger "><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
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
        $ticketAttribute['ticket_name'] = $request->ticket_name;
        $ticketAttribute['concert_date'] = $request->concert_date;
        $ticketAttribute['ticket_image'] = $request->ticket_name.'-'.$filename;

        $ticketCreate =  Ticket::create($ticketAttribute);

        if(!$ticketCreate) {
            Alert::error('Error', 'Whoops! Something wrong!');
            return redirect()->route('ticket.create');
        } else {
            Alert::success('Success', 'New ticket has been aded');
            return redirect()->route('ticket.index');
        }
    }

   
    public function show($id)
    {
        $ticket = Ticket::with(['Venues','Artists'])->find($id);
        $ticketCheapest = Ticket::with('TicketCategories')->where('id_ticket',$id)->get()->sortBy('ticket_price');
        // $ticketCheapest->values()->where($id,'id_ticket');
        // dd($ticketCheapest);
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
        $ticket = Ticket::where('id_ticket',$id)->first();
        if ($ticket != null) {
            $ticket->delete(public_path('ticket',$ticket->ticket_image));
            $ticketDelete =  $ticket->delete();
            if(!$ticketDelete){
                Alert::failed('Error', 'There something wrong with your data');
                return redirect()->route('ticket.index');
            } else{
                Alert::success('Success', 'Data deleted');
              return redirect()->route('ticket.index');
            }
        }
    }
}
