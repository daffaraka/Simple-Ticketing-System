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
    public function creatTransaction(Request $request)
    {
        dd($request->all());
        Transaction::create($request->all);

        return redirect()->route('home');
    }


    public function viewPemesanan($id, Request $request)
    {

        $ticket = TicketCategory::with('Ticket')->find($id);
        $ticketCategories = TicketCategory::find($id);

        return view('client.order-ticket', compact(['ticket', 'ticketCategories']));
    }

    public function createPemesanan($id, Request $request)
    {
       
        $ticket = TicketCategory::with('Ticket')->find($id);
        $ticketCategories = TicketCategory::find($id);
        $pemesananAttr = [];
        $pemesananAttr['nama_pengunjung'] = $request->nama_pengunjung;
        $pemesananAttr['nomor_pengunjung'] = $request->nomor_pengunjung;
        $pemesananAttr['email_pengunjung'] = $request->email_pengunjung;
        $pemesananAttr['jumlah_ticket'] = 1;
        $pemesananAttr['total'] = $ticketCategories->ticket_price;
        $pemesananAttr['id_ticket'] = $ticketCategories->Ticket->value('id_ticket');
        $pemesananAttr['id_ticket_category'] = $ticketCategories->value('id_categories');
        $pemesananAttr['id_user'] = Auth::user()->id;
        $pemesananAttr['status'] = 'PENDING';

        
        $createPemesanan = Pemesanan::create($pemesananAttr);
        if (!$createPemesanan) {
            Alert::error('Error Message', 'Optional Title');
            return redirect()->route('client.showTicket', ['id_ticket' => $ticket->id_ticket]);
        } else {
            Alert::success('Success Message', 'Optional Title');
            return redirect()->route('ticket.index');
        }
    }
}
