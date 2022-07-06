@extends('admin.layout.layout-main')
<title>Venue</title>
@section('content')
    <div class="container py-1">
        <div class="row mb-2 justify-content-center">
            <div class="col-lg-12 col-md-6 p-2">
                <a href="{{ route('venues.create') }}"><button class="btn btn-primary">
                        <i class="fa fa-user-plus"></i>
                        Add Venue</button>
                </a>
                <table id="data-table-list" class="table table-dark table-striped text-start shadow">
                    <thead>
                        <tr>
                            <th class="px-2">#</th>
                            <th class="px-2">Venue Name</th>
                            <th class="px-2">Capacity</th>
                            <th class="px-2">Location</th>
                            <th class="px-2">Picture</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark table-striped shadow">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('venues.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data : 'id_venue',
                        name: 'id_venue'
                    },
                    {
                        data: 'venue_name',
                        name: 'venue_name'
                    },
                    {
                        data: 'venue_capacity',
                        name: 'venue_capacity'
                    },
                    {
                        data: 'venue_location',
                        name: 'venue_location'
                    },

                    {
                        data: 'venue_pict',
                        render: function(data, type, row, meta) {
                            return '<img src="{{ asset('Venue') }}/' + data +
                                '" class="img-thumbnail" class="m-3 mx-auto d-block" />';
                        },
                        name: 'venue_pict'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    },


                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
    </script>
@endsection
