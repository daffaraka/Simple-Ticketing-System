@extends('client.client-layout')
@section('content')
    <div class="container py-5 px-5">
        <div class="row py-3">
            <h2>Complete your order</h2>
            {{-- <div class="payment-title">
                <p>Please complete your order to access payment. First choose your ticket category </p>
            </div> --}}

            <div class="col-lg-6">
                <form action="" class="pe-3">
                    <div class="mb-3">
                        <label class="form-label">Guest Name</label>
                        <input class="form-control" type="text" name="name" placeholder="Guest Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guest Phone Number</label>
                        <input class="form-control" type="text" name="" placeholder="Guest Number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="text" name="" placeholder="Email">
                    </div>
                    <div class="mb-3">

                        <label for="form-label">Select your ticket</label>
                        {{-- <label for="my-select">Select Ticket</label>
                        <div class="form-check">
                            @foreach ($ticketCategories->TicketCategories as $tc)
                                <label class="form-check">
                                    <input type="radio" class="form-check-input" name="" id=""
                                        value="{{$tc->id}}">

                                    {{ $tc->ticket_category }}
                                </label>
                            @endforeach
                        {{-- </div> --}}

                        {{-- <a href="#" class="text-decoration-none text-dark">
                            <div class="ticket-box rounded shadow p-3 mt-3 w-100">
                                <h6>{{ $tc->ticket_category }}</h6>
                                <hr>
                                <p> <i class="fas fa-money-bill fa-1x "></i> Rp. {{ number_format($tc->ticket_price) }}</p>
                            </div>
                           </a> --}}

                        <select name="" id="" class="form-control">
                            @foreach ($ticketCategories->TicketCategories as $tc)
                            <option value="{{$tc->id}}">{{$tc->ticket_category}}</option>
                            @endforeach
                        </select>


                    </div>
                    <button class="btn btn-success" type="submit">Submit</button>
                </form>
            </div>

            <div class="col-lg-4 bg-light py-3">
                <h3> Ticket Summary </h3>
                <div class="white-line"></div>
                <div class="payment-content p-3">
                    <img class="img-thumbnail" src="{{ asset('ticket_image/' . $ticket->ticket_image) }}" alt="">
                </div>
                <div class="mt-3">
                    <h5> Ticket Details </h5>
                </div>
                <hr>
                <div class="mb-3">
                    <h5> {{ $ticket->ticket_name }}</h5>
                    <div class="white-line"></div>
                    <i class="fa fa-calendar-check fa-1x  "></i>&nbsp;
                    {{ \Carbon\Carbon::parse($ticket->concert_date)->toDateString() }} <br>
                    <i class="fa fa-map-pin fa-1x" aria-hidden="true"></i> &nbsp; {{ $ticket->Venues->venue_name }} <br>
                    <i class="fas fa-music fa-1x"></i> {{ $ticket->Artists->artist_name }}
                </div>



            </div>
        </div>




    </div>
@endsection
