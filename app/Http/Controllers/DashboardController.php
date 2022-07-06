<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Pemesanan;
use App\Models\Ticket;
use App\Models\Venue;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ticket = Ticket::count();
        $artist = Artist::count();
        $venue = Venue::count();
        $pemesanan = Pemesanan::count();
      
        return view('admin.admin-dashboard',compact(['ticket','artist','venue','pemesanan']));
    }


}
