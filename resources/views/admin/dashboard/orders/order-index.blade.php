@extends('admin.layout.layout-main')
<title>Orders</title>
@section('content')
<div class="container py-1">
    <a href="{{route('order.export')}}" class="btn btn-dark ms-0"><i class="fa fa-print"></i>  Export Excel</a>
    <div class="row mb-2 justify-content-center">
        <div class="col-lg-12 col-md-6 p-2">
           <table class="table table-dark table-striped text-start shadow">
               <thead>
                   <tr>
                       <th class="px-2">#</th>
                       <th class="px-2">Guest Name</th>
                       <th class="px-2">Qty </th>
                       <th class="px-2">Ticket </th>
                       <th class="px-2">Total </th>
                       <th class="px-2">Proof of Payment</th>
                       <th class="px-2">Status</th>
                   </tr>
               </thead>
               <tbody class="table-dark">
                  
                   @foreach ($order as $o)
                        <tr>
                            <td>{{$loop->iteration++}}</td>
                            <td>{{$o->nama_pengunjung}}</td>
                            <td>{{$o->jumlah_ticket}}</td>
                            <td> <span class="btn btn-info px-2 py-2"> {{$o->Ticket->ticket_name}} - {{$o->TicketCategory->ticket_category}}  </span> </td>
                            <td>Rp. {{number_format($o->total)}}</td>
                            <td> <img class="img-thumbnail" style="width: 100px;" src="{{asset('bukti_pembayaran/'.$o->bukti_pembayaran)}}" alt=""></td>
                            <td> <span class="btn btn-light  px-2 py-2"> {{$o->status}}</span> </td>
                            {{-- <td>{{$a->id_artist}}</td>
                            <td>{{$a->artist_name}}</td>
                            <td>{{$a->artist_dom}}</td>
                            <td>
                                <a href="{{route('artist.edit',$a->id_artist)}}" class="btn btn-dark">Edit</a>
                                <a href="{{route('artist.destroy',$a->id_artist)}}" class="btn btn-danger">Delete</a>
                            </td> --}}
                        </tr>
                   @endforeach
                  
               </tbody>
           </table>
        </div>
    </div>
</div>
  
@endsection