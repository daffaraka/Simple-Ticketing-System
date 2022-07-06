@extends('admin.layout.layout-main')
<title>Add New Ticket</title>
@section('content')
    <div class="container p-5 py-1">

        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form method="post" action="{{ route('ticket.update',$ticket->id_ticket) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <div class="label">Artist</div>
                                <select class="form-control" type="text" name="artist" id="artist_name">
                                    @foreach ($artist as $a)
                                        <option value="{{ $a->id_artist }}">
                                            {{ $a->artist_name ? $a->artist_name : 'Tidak ada' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <div class="label">Venue</div>
                                <select class="form-control" type="text" name="venue" id="artist_name">
                                    @foreach ($venue as $v)
                                        <option value="{{ $v->id_venue }}">{{ $v->venue_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <div class="label">Ticket Name</div>
                                <input class="form-control" type="text" name="ticket_name" id="ticket_name" value="{{$ticket->ticket_name}}">
                            </div>

                            <div class="mb-2">
                                <div class="label">Date</div>
                                <input class="form-control" type="date" name="concert_date" id="concert_date">
                            </div>

                            <div class="mb-2">
                                <div class="label">Image</div>
                                <input class="form-control" type="file" name="ticket_image" id="ticket_image">
                            </div>

                            <button type="submit" class="btn btn-primary my-3" onclick="createTicket()"> <i
                                    class="fa fa-i-plus"></i> Add New
                                Ticket
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script></script>
       
    @endsection