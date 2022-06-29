@extends('client.client-layout')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($ticket as $t)
                <div class="col-md-4 p-3" style="margin-top: 14px">
                    <a href="{{route('client.showTicket',$t->id_ticket)}}" class="a-link p-1">
                        <div class="card rounded">
                            <img class="ticket-image rounded-top" style="height: 346px;" src="{{ asset('ticket_image/' . $t->ticket_image) }}"
                                alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $t->ticket_name }}</h5>
                                <p>Description</p>
                                <span>
                                    <h6> {{ $t->Venues->venue_location }} </h6>
                                </span>
                                <span> {{ \Carbon\Carbon::parse($t->concert_date)->diffForHumans() }}</span>
                            </div>
                            <div class="card-footer mb-0 d-flex">
                                <p class="mb-0">Rp.{{ number_format($t->ticket_price) }}</p>
                                <span class="px-4">Ticket available now</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
