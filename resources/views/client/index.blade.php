@extends('client.client-layout')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($ticket as $t)
                <div class="col-md-4 p-3" style="margin-top: 14px">
                    <a href="{{route('client.showTicket',$t->id_ticket)}}" class="a-link p-1">
                        <div class="card rounded-0 shadow">
                            <img class="ticket-image rounded-top p-3" style="height: 346px;" src="{{ asset('ticket_image/'.$t->ticket_image) }}"
                                alt="">
                            <div class="card-body border">
                                <h5 class="card-title">{{ $t->ticket_name }}</h5>
                                <span>
                                    <h6> {{ $t->Venues->venue_location }} </h6>
                                </span>
                                <span> {{ \Carbon\Carbon::parse($t->concert_date)->toDateString() }}</span>
                            </div>
                            <div class="card-footer mb-0 d-flex">
                                <span>Ticket available now</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
