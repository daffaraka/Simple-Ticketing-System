<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    public function index()
    {
        $ticket = Ticket::all();

        return view('client.index', compact('ticket'));
    }

    public function showTicket($id)
    {
        $ticket = Ticket::with(['Venues', 'Artists'])->find($id);

        return view('client.show-ticket', compact('ticket'));
    }

    public function order($id)
    {
        $ticket = Ticket::with(['Venues', 'Artists'])->find($id);
        $ticketCategories = Ticket::with('TicketCategories')->find($id);
        // dd($ticketCategories);
        return view('client.order-ticket', compact(['ticket', 'ticketCategories']));
    }

  

    public function profile()
    {
        $user = Auth::user();

        return view('client.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user()->id;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $userSave =  $user->save();
       
        if(!$userSave)
        {
            Alert::failed('Error!','Cannot update profile');
            return redirect()->route('client.profile');
        } else {
            Alert::success('Success','Your profile updated');
            return redirect()->route('client.profile');
        }
     
    }

    public function pemesanan()
    {
        $user = Auth::user()->id;
        $pemesanan = Pemesanan::where('id_user',$user)->get();
        // dd($pemesanan);
        return view('client.transaction',compact('pemesanan'));
    }

    public function methodPembayaran($id)   
    {
        $pemesanan = Pemesanan::find($id);

        return view('client.method-pembayaran',compact('pemesanan'));
    }

    public function buktiPembayaran($id)
    {
        $pemesanan = Pemesanan::with(['TicketCategory'])->find($id);
       
        return view('client.bukti-pembyaran',compact('pemesanan'));
    }

    public function uploadPembayaran($id,Request $request)
    {
        $pemesanan = Pemesanan::find($id);
        $user = Auth::user();

        $file = $request->file('bukti_pembayaran');
        $filename = $file->getClientOriginalName();
       
        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "bukti_pembayaran";
        
        //uploaded file
        $file->move($location, $user->name.'-'.$filename);
        
        $pemesananAttr = [];
        $pemesananAttr['bukti_pembayaran'] = $user->name.'-'.$filename;


        $pemesanan->update($pemesananAttr);

        return redirect()->back();
    }
}
