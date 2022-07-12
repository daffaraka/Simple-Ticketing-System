@extends('admin.layout.layout-main')
<title>Order Option</title>
@section('content')
    <div class="container p-3">
        <div class="bg-light rounded">
            @if (empty($pemesanan->bukti_pembayaran))
                <div class="card-body">
                    <h3 class="card-title">This order doesn't have proof of payment yet. </h3>
                    <div class="bg-gray-700 text-light p-5 my-3">
                        <div class="row">
                            <div class="col-4 fw-bold">
                                <p>Nama Pengunjung</p>
                                <hr>
                                <p>Email Pengunjung</p>
                                <hr>
                                <p>Nomor Pengunjung</p>
                                <hr>
                                <p>Nomor Identitas</p>
                                <hr>
                                <p>Type Identitas</p>
                                <hr>
                                <p>Total</p>
                                <hr>
                                <p>Status</p>
                                <hr>

                            </div>
                            <div class="col-8">
                                <p>{{ $pemesanan->nama_pengunjung }}</p>
                                <hr>
                                <p>{{ $pemesanan->email_pengunjung }}</p>
                                <hr>
                                <p>{{ $pemesanan->nomor_pengunjung }}</p>
                                <hr>
                                <p>{{ $pemesanan->nomor_identitas }}</p>
                                <hr>
                                <p>{{ $pemesanan->type_identitas }}</p>
                                <hr>
                                <p>Rp.{{ number_format($pemesanan->total) }}</p>
                                <hr>
                                <p>{{ $pemesanan->status }}</p>
                                <hr>

                            </div>
                        </div>

                    </div>
                @else
                    <div class="card-body px-4 ms-4">
                        <h3 class="card-title ">Order detail</h3>
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid" style="max-width:700px;"
                                src="{{ asset('bukti_pembayaran' . $pemesanan->nib_pict) }}"
                                alt="Proof of payment from {{ $pemesanan->User->name }}">
                        </div>
                        <div class="bg-gray-700 text-light p-5 my-3">
                            <div class="row">
                                <div class="col-4 fw-bold">
                                    <p>Nama Pengunjung</p>
                                    <hr>
                                    <p>Email Pengunjung</p>
                                    <hr>
                                    <p>Nomor Pengunjung</p>
                                    <hr>
                                    <p>Nomor Identitas</p>
                                    <hr>
                                    <p>Type Identitas</p>
                                    <hr>
                                    <p>Total</p>
                                    <hr>
                                    <p>Status</p>
                                    <hr>

                                </div>
                                <div class="col-8">
                                    <p>{{ $pemesanan->nama_pengunjung }}</p>
                                    <hr>
                                    <p>{{ $pemesanan->email_pengunjung }}</p>
                                    <hr>
                                    <p>{{ $pemesanan->nomor_pengunjung }}</p>
                                    <hr>
                                    <p>{{ $pemesanan->nomor_identitas }}</p>
                                    <hr>
                                    <p>{{ $pemesanan->type_identitas }}</p>
                                    <hr>
                                    <p>Rp.{{ number_format($pemesanan->total) }}</p>
                                    <hr>
                                    <p> {{ $pemesanan->status }}</p>
                                    <hr>
                                </div>
                            </div>

                        </div>


                        <hr>
                    </div>

                    <div class="px-5">
                        <form action="{{ route('eo.order.accept', $pemesanan->id_pemesanan) }}" class="d-inline" method="POST">
                            @csrf 
                            <button class="btn btn-primary " type="submit">
                                <i class="fa fa-check" aria-hidden="true"></i> Approve</button>
                        </form>

                        <a href="{{ route('eo.order.index') }}" class="btn btn-danger" type="button"> <i
                                class="fa fa-backward" aria-hidden="true"></i> Back</a>
                    </div>
            @endif
        </div>

    </div>
@endsection
