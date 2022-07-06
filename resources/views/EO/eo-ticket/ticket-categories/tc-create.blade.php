@extends('admin.layout.layout-main')
@section('title', 'Add Ticket Category')
@section('content')
    <div class="container">
        <div class="row p-2">
            <div class="col-lg-8 bg-white p-4 mx-5 rounded shadow">
                <form method="post" action="{{ route('ticketCategory.store',$ticket->id_ticket) }}">
                    @csrf
                    <div class="mb-3">
                        <div class="label fw-bold mb-2">Ticket Name</div>
                        <input class="form-control" type="text" disabled value="{{$ticket->ticket_name}}">
                    </div>
                    <div class="mb-3">
                        <div class="label fw-bold mb-2">Artist Name</div>
                        <input class="form-control" type="text" disabled value="{{$ticket->Artists->artist_name}}">
                    </div>
                    <div class="mb-3">
                        <div class="label fw-bold mb-2">Venue</div>
                        <input class="form-control" type="text" disabled value="{{$ticket->Venues->venue_name}}">
                    </div>
                    <div class="mb-3">
                        <div class="label fw-bold mb-2">Concert date</div>
                        <input class="form-control" type="text" value="{{ \Carbon\Carbon::parse($ticket->concert_date)->toDateString()}}" disabled >
                    </div>
                    <div class="mb-3">
                        <div class="label fw-bold mb-2">Ticket Category Name</div>
                        <input class="form-control" type="text" name="ticket_category" id="ticket_category">
                    </div>
                   
                    <div class="mb-3">
                        <div class="label fw-bold mb-2">Price</div>
                        <input class="form-control" type="number" name="ticket_price" id="ticket_price">
                    </div>
                
                    <button type="submit" class="btn btn-primary my-3"> <i class="fa fa-i-plus"></i> Add Artist </button>
                </form>
            </div>

        </div>
    </div>
@endsection
