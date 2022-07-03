@extends('client.client-layout')
@section('content')
    <div class="container my-4">
        <div class="row flex-lg-nowrap">
            <div class="col-12 col-lg-auto mb-3" style="width: 200px;">
                <div class="card p-3">
                    <div class="e-navlist e-navlist--active-bg">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link px-2 active" href="#"><i
                                        class="fa fa-fw fa-bar-chart mr-1"></i><span>Overview</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-crud-users" target="__blank"><i
                                        class="fa fa-fw fa-th mr-1"></i><span>CRUD</span></a></li>
                            <li class="nav-item"><a class="nav-link px-2"
                                    href="https://www.bootdey.com/snippets/view/bs4-edit-profile-page" target="__blank"><i
                                        class="fa fa-fw fa-cog mr-1"></i><span>Settings</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile px-3">

                                    <h1>Your Transaction</h1>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <div class="row px-2">

                                                <div class="col-lg-12 px-0">
                                                    <div class="row px-2 py-3">
                                                        <div class="col">
                                                            <table class="table table-dark table-striped shadow">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="px-2">#</th>
                                                                        <th class="px-2">Guest Name</th>
                                                                        <th class="px-2">Ticket</th>
                                                                        <th class="px-2">Order Date</th>
                                                                        <th class="px-2">Total</th>
                                                                        <th class="px-2">Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="table-light">
                                                                    @foreach ($pemesanan as $data)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $data->nama_pengunjung }}</td>
                                                                            <td>{{ $data->Ticket->ticket_name }}</td>
                                                                            <td>{{ $data->created_at }}</td>
                                                                            <td>Rp.{{ number_format($data->total)}}</td>
                                                                            <td>{{ $data->status }}</td>
                                                                            {{-- <td>
                                                                                <a href="{{ route('ticket.show', $t->id_ticket) }}" class="btn btn-outline-warning">Show</a>
                                                                                <a href="{{ route('ticket.edit', $t->id_ticket) }}" class="btn btn-dark">Edit</a>
                                                                                <a href="{{ route('ticket.destroy', $t->id_ticket) }}" class="btn btn-danger">Delete</a>
                                                                            </td> --}}
                                                                        </tr>
                                                                    @endforeach
                                                
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        {{-- <div class="col">
                                                            <div class="row shadow-sm mb-3">
                                                                <div class="col-lg-1" style="width:50px;">
                                                                    #
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    Guest Name
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    Ticket
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    Order Date
                                                                </div>
                                                                <div class="col-lg-2">
                                                                    Total
                                                                </div>
                                                                <div class="col">
                                                                    Status
                                                                </div>
                                                            </div>
                                                            <div class="row "> --}}
                                                              
                                                            {{-- </div>
                                                        </div> --}}
                                                        {{-- Caption Information --}}




                                                    </div>
                                                    {{-- <hr class="my-0 p-0">
                                                        <div class="row px-3 py-3">
                                                            <div class="col-lg-4"> Total:<span class="btn btn-outline-warning"> {{number_format($data->total)}}</div></span> 
                                                            <div class="col-lg-4">Tes</div>
                                                        </div> --}}

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
