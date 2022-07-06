@extends('client.client-layout')
@section('content')
    <div class="container py-5 px-5">
        <div class="row py-3 px-5 bg-dark text-light d-flex justify-content-between">
            <h2>Complete your order</h2>
            {{-- <div class="payment-title">
                <p>Please complete your order to access payment. First choose your ticket category </p>
            </div> --}}

            <div class="col-lg-6">
                <form action="{{ route('client.createPemesanan', $ticketCategories->id_categories) }}" enctype="multipart/form-data" class="pe-3"
                    method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Guest Name</label>
                        <input class="form-control shadow" type="text" name="nama_pengunjung" placeholder="Guest Name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Guest Phone Number</label>
                        <input class="form-control shadow" type="text" name="nomor_pengunjung"
                            placeholder="Guest Number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control shadow" type="text" name="email_pengunjung" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Identity Number</label>
                        <input class="form-control shadow" type="number" name="nomor_identitas" placeholder="Your Identity">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Identity Type</label>
                        <select name="type_identitas" class="form-control">
                            <option value="KTP">KTP</option>
                            <option value="NIK">NIK</option>
                            <option value="Passport">Passport</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Identity Pict  </label>
                        <input class="form-control" type="file" name="gambar_identitas">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <div class="card">
                            <div class="card-body shadow text-dark">
                                <h6>{{ $ticketCategories->ticket_category }}</h6>
                                <div class="white-line"></div>
                                <h5 class="card-title">Rp. {{ number_format($ticketCategories->ticket_price) }}</h5>

                            </div>
                        </div>




                    </div>
                    <button class="btn btn-success" type="submit">Submit</button>
                </form>
            </div>

            <div class="col-lg-5 bg-light py-3 shadow">
                <h3 class="text-dark"> Ticket Summary </h3>
                <div class="white-line"></div>
                <div class="payment-content p-3 d-flex justify-item-center">
                    <img class="img-thumbnail" src="{{ asset('ticket_image/' . $ticket->Ticket->ticket_image) }}"
                        alt="">
                </div>
                <div class="mt-3 text-dark">
                    <h5> Ticket Details </h5>
                </div>
                <hr>
                <div class="mb-3 text-dark">
                    <h5> {{ $ticket->ticket_name }}</h5>
                    <div class="white-line"></div>
                    <i class="fa fa-calendar-check fa-1x  "></i>&nbsp;
                    {{ \Carbon\Carbon::parse($ticket->concert_date)->toDateString() }} <br>
                    <i class="fa fa-map-pin fa-1x" aria-hidden="true"></i> &nbsp;
                    {{ $ticket->Ticket->Venues->venue_name }} <br>
                    <i class="fas fa-music fa-1x"></i> {{ $ticket->Ticket->Artists->artist_name }}

                </div>



            </div>

        </div>




    </div>
@endsection
