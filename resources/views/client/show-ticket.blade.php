@extends('client.client-layout')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <img class="card-img" src="{{ asset('ticket_image/' . $ticket->ticket_image) }}" alt="">
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="bg-dark text-light py-2 px-3">
                    <span>   Event will be held on {{ \Carbon\Carbon::parse($ticket->concert_date)->diffForHumans() }} </span>
                </div>
                <div class="card rounded-none mt-2">
                    <div class="card-body ">
                        <h2 class="card-title fw-bold">{{$ticket->ticket_name}}</h2>
                        <p class="card-text">Content</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Start from </h5>
                        <p class="card-text">Rp.{{number_format($ticket->ticket_price)}} / item</p>
                        <a href="{{route('client.order',$ticket->id_ticket)}}" class="btn btn-warning">Order Now</a>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6">
                <form action="" class="px-5 border-1">
                    <span class="p-0">
                        <h1>Booking Form</h1>
                    </span>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control rounded-0" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div> --}}
        </div>
    </div>
@endsection
