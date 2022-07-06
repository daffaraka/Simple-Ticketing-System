<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Exports\PemesananExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        $order = Pemesanan::with(['Ticket','TicketCategory','User'])->get();

        if (request()->ajax()) {

            return DataTables::of($order)->addColumn('action', function ($data) {
                $button =' <a href="order/'.$data->id_pemesanan.' " data-toggle="tooltip"  data-id="' . $data->id_pemesanan . '" data-original-title="Show" class="show btn btn-success px-3 show-post"><i class="far fa-edit"></i> Show Detail</a>';
                $button .= '&nbsp;&nbsp;';
                return $button;
            })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        };
        return view('admin.dashboard.orders.order-index',compact('order'));    
    }

    public function export(Pemesanan $pemesanan)
    {
        return Excel::download(new PemesananExport($pemesanan),'pemesanan.xlsx');
    }
}
