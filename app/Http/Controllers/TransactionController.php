<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{
    public function creatTransaction(Request $request)
    {
        dd($request->all());
        Transaction::create($request->all);

        return redirect()->route('home');
    }

    public function createPemesanan($id,Request $request)
    {
        $ticket = Ticket::find($id);
        $pemesananAttr = [];
        $pemesananAttr['nama_pemesan'] = $request->nama_pemesanan;
        $pemesananAttr['email_pemesan'] = $request->email_pemesan;
        $pemesananAttr['nomor_pemesan'] = $request->nomor_pemesan;
        $pemesananAttr['nama_pengunjung'] = $request->nama_pengunjung;
        $pemesananAttr['email_pengunjung'] = $request->email_pengunjung;
        $pemesananAttr['nomor_pengunjung'] = $request->nomor_pengunjung;
        $pemesananAttr['jumlah_ticket'] = $request->jumlah_ticket;
        $pemesananAttr['total'] = $request->total;
        $pemesananAttr['id_ticket'] = $request->id_ticket;
        $pemesananAttr['id_user'] = $request->id_user;
        $pemesananAttr['status'] = 'PENDING';

        $createPemesanan = Pemesanan::create($pemesananAttr);
        if(!$createPemesanan) {
            Alert::error('Error Message', 'Optional Title');
            return redirect()->route('client.showTicket',['id_ticket' => $ticket->id_ticket]);
        } else {
            Alert::success('Success Message', 'Optional Title');
            return redirect()->route('ticket.index');
        }
    }
}
