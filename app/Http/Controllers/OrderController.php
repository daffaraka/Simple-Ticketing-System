<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Exports\PemesananExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index()
    {
        $order = Pemesanan::with(['Ticket','TicketCategory','User'])->get();

        return view('admin.dashboard.orders.order-index',compact('order'));    
    }

    public function export(Pemesanan $pemesanan)
    {
        return Excel::download(new PemesananExport($pemesanan),'pemesanan.xlsx');
    }
}
