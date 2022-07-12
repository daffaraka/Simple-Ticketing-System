<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Artist;
use App\Models\Pemesanan;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class EoController extends Controller
{
    public function index()
    {
        $auth = Auth::user()->id;
        $ticket = Ticket::with(['Venues','Artists','TicketCategories','Users'])->where('id_user',$auth)->get();
      
        if (request()->ajax()) {

            return DataTables::of($ticket)->addColumn('action', function ($data) {
            $button =' <a href="ticket-management/'.$data->id_ticket.' " data-toggle="tooltip"  data-id="' . $data->id_ticket . '" data-original-title="Show" class="show btn btn-sm btn-success px-3 show-post"><i class="far fa-edit"></i> Detail</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="ticket-management/edit/'.$data->id_ticket.' " data-toggle="tooltip"  data-id="' . $data->id_ticket . '" data-original-title="Edit" class="edit btn btn-sm btn btn-warning px-2 edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="ticket-management/delete/'.$data->id_ticket.'" name="delete" id="' . $data->id_ticket . '" class="delete btn btn-sm px-2 btn-danger "><i class="far fa-trash-alt"></i> Delete</a>';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        return view('EO.eo-ticket.eo-ticket-index',compact('ticket'));
    }

   
    public function create()
    {
        $venue = Venue::all();
       
        $artist = Artist::all();

      
        return view('EO.eo-ticket.eo-ticket-create',compact(['venue','artist']));
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
        $ticketAttribute['id_user'] = Auth::user()->id;
        $ticketAttribute['ticket_name'] = $request->ticket_name;
        $ticketAttribute['concert_date'] = $request->concert_date;
        $ticketAttribute['ticket_image'] = $request->ticket_name.'-'.$filename;

        $ticketCreate =  Ticket::create($ticketAttribute);

        if(!$ticketCreate) {
            Alert::error('Error', 'Whoops! Something wrong!');
            return redirect()->route('eo.ticket.create');
        } else {
            Alert::success('Success', 'New ticket has been aded');
            return redirect()->route('eo.ticket.index');
        }
    }

   
    public function show($id)
    {
        $ticket = Ticket::with(['Venues','Artists'])->find($id);
        $ticketCheapest = Ticket::with('TicketCategories')->where('id_ticket',$id)->get()->sortBy('ticket_price');
        // $ticketCheapest->values()->where($id,'id_ticket');
        // dd($ticketCheapest);
        return view('EO.eo-ticket.eo-ticket-show',compact('ticket'));
    }

   
    public function edit($id,Ticket $ticket)
    {
        $venue = Venue::all();
        $artist = Artist::all();
        $ticket = Ticket::with(['Venues', 'Artists'])->find($id);
        return view('EO.eo-ticket.eo-ticket-edit', compact(['ticket', 'venue', 'artist']));
    }


    public function update($id,Request $request)
    {
        $ticket = Ticket::find($id);

        $file = $request->file('ticket_image');
        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "ticket_image";

        //uploaded file
        $file->move($location, $request->ticket_name . '-' . $filename);


        $ticketAttribute = [];
        $ticketAttribute['ticket_name'] = $request->ticket_name;
        $ticketAttribute['concert_date'] = $request->concert_date;
        $ticketAttribute['ticket_image'] = $request->ticket_name . '-' . $filename;
        

        $ticketUpdate =  $ticket->update($ticketAttribute);

        if (!$ticketUpdate) {
            Alert::error('Error', 'Whoops! Something wrong!');
            return redirect()->route('eo.ticket.create');
        } else {
            Alert::success('Success', 'New ticket has been aded');
            return redirect()->route('eo.ticket.index');
        }
    }

   
    public function destroy($id)
    {
        $ticket = Ticket::where('id_ticket',$id)->first();
        if ($ticket != null) {
            $ticket->delete(public_path('ticket',$ticket->ticket_image));
            $ticketDelete =  $ticket->delete();
            if(!$ticketDelete){
                Alert::success('Success', 'Data has been deleted');
                return redirect()->route('eo.ticket.index');
            } else{
                Alert::error('Error', 'Something wrong');
              return redirect()->route('eo.ticket.index');
            }
        }
    }

    public function pemesanan()
    {
        $order = Pemesanan::with(['Ticket','TicketCategory','User'])->get();

        if (request()->ajax()) {

            return DataTables::of($order)->addColumn('action', function ($data) {
                $button = '<a href="order/option/'.$data->id_pemesanan.' " data-toggle="tooltip"  data-id="' . $data->id_pemesanan . '" data-original-title="Show" class="show btn btn-primary px-3 show-post"><i class="fa fa-list"></i> Option</a>';
                $button .= '&nbsp;&nbsp;';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        return view('EO.orders.order-index',compact('order'));    
    }

    public function orderOption($id)
    {
        $pemesanan = Pemesanan::with('User')->find($id);

        return view('EO.orders.order-option',compact('pemesanan'));
    }

    public function acceptPayment($id)
    {
        $pemesanan = Pemesanan::find($id);
        $pemesananAttr = [];
        $pemesananAttr['status'] = 'BERHASIL';

        $pemesananUpdate =  $pemesanan->update($pemesananAttr);
        if (!$pemesananUpdate) {
            Alert::error('Error', 'Whoops! Something wrong!');
            return redirect()->back();
        } else {
            Alert::success('Success', 'Status has been updated');
            return redirect()->back();
        }
       
    }


}
