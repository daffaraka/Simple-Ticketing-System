@extends('admin.layout.layout-main')
<title>Ticket Management</title>
@section('content')
    <div class="p-1">
        <div class="container bg-gray-200 p-5 py-3 rounded">


            <div class="row p-2">
                <a href="{{ route('eo.ticket.create') }}" class="btn btn-primary w-auto">Add New Ticket</a>
                <table id="data-table-list" class="table table-dark table-striped shadow mb-3">
                    <thead>
                        <tr>
                            <th class="px-2">#</th>
                            <th class="px-2">Ticket Name</th>
                            <th class="px-2">Artist Name</th>
                            <th class="px-2">Venue</th>
                            <th class="px-2">EO Manager</th>
                            <th class="px-2">Concert Date</th>
                            <th class="px-2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark table-striped shadow">


                    </tbody>
                </table>

            </div>
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
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $(document).ready(function() {
            var i = 1;
            $('#data-table-list').DataTable({
                renderer: {

                    "pageButton": "bootstrap"
                },
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('eo.ticket.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'id_ticket',
                        name: 'id_ticket'
                    },
                    {
                        data: 'ticket_name',
                        name: 'ticket_name',
                    },
                    {
                        data: 'artists.artist_name',
                        name: 'artists.artist_name'
                    },
                    {
                        data: 'venues.venue_name',
                        name: 'venues.venue_name'
                    },
                    {
                        data: 'users.name',
                        name: 'users.name'
                    },
                    {
                        data: 'concert_date',
                        name: 'concert_date'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }


                ]
            });
        });
    </script>
@endpush
