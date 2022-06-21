@extends('admin.layout.layout-main')
<title>Ticket Management</title>
@section('content')
    <div class="container p-5 py-1">
        <a href="{{ route('ticket.create') }}" class="btn btn-warning">Create new ticket</a>
        <div class="row p-2">
            <table class="table table-dark table-striped shadow">
                <thead>
                    <tr>
                        <th class="px-2">#</th>
                        <th class="px-2">Ticket Name</th>
                        <th class="px-2">Artist Name</th>
                        <th class="px-2">Venue</th>
                        <th class="px-2">Concert Date</th>
                        <th class="px-2">Action</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($ticket as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->ticket_name }}</td>
                            <td>{{ $t->Artists->artist_name }}</td>
                            <td>{{ $t->Venues->venue_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($t->concert_date)->toDateString()}}</td>
                            <td>
                                <a href="{{ route('ticket.show', $t->id_ticket) }}" class="btn btn-outline-warning">Show</a>
                                <a href="{{ route('ticket.edit', $t->id_ticket) }}" class="btn btn-dark">Edit</a>
                                <a href="{{ route('ticket.destroy', $t->id_ticket) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>


    {{-- @foreach ($ticket as $t)
        <div class="col-md-4" style="margin-top: 14px">
            <div class="card rounded">
                <img class="ticket-image rounded-top" src="{{ asset('ticket/' . $t->ticket_image) }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $t->ticket_name }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk
                        of
                        the card's content.</p>
                    <span>
                        <h6> {{ $t->Venues->venue_location }} </h6>
                    </span>
                    <span> {{ \Carbon\Carbon::parse($t->concert_date)->diffForHumans() }}</span>
                </div>
                <div class="card-footer mb-0">
                    <p>Rp.{{ number_format($t->ticket_price) }}</p>
                </div>
            </div>
        </div>
    @endforeach --}}
@endsection
