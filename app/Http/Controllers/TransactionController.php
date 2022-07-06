<?php

namespace App\Http\Controllers;

use id;
use App\Models\Ticket;
use App\Models\Pemesanan;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TicketCategory;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
     
    }
  
    public function viewPemesanan($id, Request $request)
    {

        $ticket = TicketCategory::with('Ticket')->find($id);
        $ticketCategories = TicketCategory::find($id);

        return view('client.order-ticket', compact(['ticket', 'ticketCategories']));
    }

    public function createPemesanan($id, Request $request)
    {
     
       

        $file = $request->file('gambar_identitas');
        $filename = $file->getClientOriginalName();
       
        $extension = $file->getClientOriginalExtension();

        //uploaded location
        $location = "Identitas Pengunjung";

        //uploaded file
        $file->move($location, $request->nama_pengunjung.'-'.$filename);
        $ticket = TicketCategory::with('Ticket')->find($id);
        $ticketCategories = TicketCategory::find($id);
        $pemesananAttr = [];
        $pemesananAttr['nama_pengunjung'] = $request->nama_pengunjung;
        $pemesananAttr['nomor_pengunjung'] = $request->nomor_pengunjung;
        $pemesananAttr['email_pengunjung'] = $request->email_pengunjung;
        $pemesananAttr['nomor_identitas'] = $request->nomor_identitas;
        $pemesananAttr['type_identitas'] = $request->type_identitas;
        $pemesananAttr['gambar_identitas'] = $request->nama_pengunjung.'-'.$filename;
        $pemesananAttr['jumlah_ticket'] = 1;
        $pemesananAttr['total'] = $ticketCategories->ticket_price;
        $pemesananAttr['id_ticket'] = $ticketCategories->Ticket->value('id_ticket');
        $pemesananAttr['id_ticket_category'] = $ticketCategories->value('id_categories');
        $pemesananAttr['id_user'] = Auth::user()->id;
        $pemesananAttr['status'] = 'PENDING';

        
        $createPemesanan = Pemesanan::create($pemesananAttr);
        if (!$createPemesanan) {
            Alert::error('Error', 'Theres\s something wrong!');
            return redirect()->route('client.showTicket', ['id_ticket' => $ticket->id_ticket]);
        } else {
            Alert::success('Success', 'New order has been added');
            return redirect()->route('client.pemesanan');
        }
    }
}
