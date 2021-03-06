@extends('admin.layout.layout-main')
<title>Details of ticket</title>
@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <img src="{{ asset('ticket_image/' . $ticket->ticket_image) }}" class="img-fluid w-50 rounded-top" alt="...">

    </div>
    <div class="card rounded-0 mt-5 p-4">
        <div class="card-header">
            <h1>{{ $ticket->ticket_name }} </h1>
          

        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $ticket->Venues->venue_name }}</h4>
            <p class="card-text">{{ \Carbon\Carbon::parse($ticket->concert_date)->format('j F, Y') }}</p>
            <br>
            @foreach ($ticket->TicketCategories as $tc)
                <div class="btn btn-warning text-start w-auto ">{{ $tc->ticket_category }} <span
                        class="btn btn-light ms-2 mb-0 px-2 py-1"> Rp. {{ number_format($tc->ticket_price) }}</span></div> <br>
            @endforeach
            <div class="w-100">

            </div>
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>
@endsection
