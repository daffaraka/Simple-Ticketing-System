@extends('client.client-layout')
<title>Bukti Pembayaran</title>
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
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-6 h-25 rounded ">
                                        <div class="row">
                                            {{-- Total Price dll --}}
                                            <div class="col-lg-12 p-2 mb-3 card">
                                                <div class="row px-2">
                                                    <div class="col-lg-5 col-md-4 col-sm-2">
                                                        <h5 class="fw-normal">Total Price</h5>
                                                        <span>
                                                            <h4 class="d-inline"><sup>Rp.</sup>
                                                                {{ number_format($pemesanan->total) }}
                                                            </h4>
                                                        </span>

                                                    </div>
                                                    <div class="col-lg-7 col-md-4 col-sm-2 text-end">
                                                        <h4 class="text-warning">{{ $pemesanan->status }}</h4>
                                                        {{-- <a href="{{ route('client.buktiPembayaran', $pemesanan->id_pemesanan) }}"
                                                            class="{{ $pemesanan->status == 'PENDING' ? 'btn btn-warning' : 'btn btn-info' }} rounded px-2">
                                                            {{ $pemesanan->status == 'PENDING' ? 'Complete your transaction' : 'Done' }}</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($pemesanan->bukti_pembayaran == null)
                                                <div class="col-lg-12 p-2 mb-3 card">
                                                    <div class="row px-2">
                                                        <h5 class="fw-normal">Complete your payment</h5>

                                                        {{-- Form Upload --}}
                                                        <form
                                                            action="{{ route('client.uploadBukti', $pemesanan->id_pemesanan) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Upload your proof
                                                                    of payment</label>
                                                                <input class="form-control" type="file"
                                                                    name="bukti_pembayaran">
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>


                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-lg-12 p-2 mb-3">
                                                    <div class="card">
                                                        <div class="card-body d-flex justify-content-center">
                                                            <img class="img" style="widht:auto; max-height:300px" src="{{asset('bukti_pembayaran/'.$pemesanan->bukti_pembayaran)}}" alt="">
                                                        </div>
                                                        <div class="card-footer">
                                                            <h4>Waiting to get confirm</h4>
                                                        </div>
                                                    </div>

                                                    
                                                </div>
                                            @endif
                                            {{-- Upload Image --}}

                                        </div>
                                    </div>
                                    <div class="col-md-5 offset-lg-1 p-3 card shadow">
                                        <div class="row">
                                            <h3 class="fw-normal">Product Details</h3>
                                            <hr>
                                            <div class="d-flex justify-content-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('ticket_image/' . $pemesanan->Ticket->ticket_image) }}"
                                                    alt="" style="max-height:300px; width:auto;">

                                            </div>
                                            <div class="mb-3">

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
