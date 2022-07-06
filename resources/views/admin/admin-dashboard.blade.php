@extends('admin.layout.layout-main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card rounded-1">
                    <div class="row px-3 py-3">
                        <div class="col-lg-4">
                            <i class="ni ni-calendar-grid-58 text-warning fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-8">
                            <h6>Artist Performer</h6>
                            <span>{{$ticket}} Artist</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card rounded-1">
                    <div class="row px-3 py-3">
                        <div class="col-lg-4">
                            <i class="ni ni-world text-primary fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-8">
                            <h6>Venue </h6>
                            <span>{{$venue}} Place</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card rounded-1">
                    <div class="row px-3 py-3">
                        <div class="col-lg-4">
                            <i class="ni ni-credit-card text-success fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-8">
                            <h6>Ticket </h6>
                            <span>{{$ticket}} Ticket to sale</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card rounded-1">
                    <div class="row px-3 py-3">
                        <div class="col-lg-4">
                            
                            <i class="ni ni-cart text-warning fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-lg-8">
                            <h6>Order</h6>
                            <span>{{$pemesanan}} Order</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4 mb-4">
                <div class="card shadow-lg rounded-1 p-5">
                    <h1 class="text-center">Welcome {{Auth::user()->name}} !</h1>
                </div>
            </div>
        </div>
    
    </div>
@endsection