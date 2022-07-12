@extends('client.client-layout')
<title>Bukti Pembayaran</title>
@section('content')
    <div class="container my-4">
        <div class="row flex-lg-nowrap">
            

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

                                                </div>
                                            </div>

                                            <div class="col-lg-12 p-2 mb-3 card">
                                                <div class="row px-2">
                                                    <div class="col-lg-12 col-md-4 col-sm-2">
                                                       <span> <h5 class="d-inline fw-normal">Payment Code :</h5> <div class="fw-bold d-inline">1235093820 </div>  </span> 


                                                    </div>

                                                </div>
                                            </div>
                                            @if ($pemesanan->bukti_pembayaran == null)
                                                <div class="col-lg-12 p-2 mb-3 card">
                                                    <div class="row px-2">
                                                        <h5 class="fw-normal">Complete your payment</h5>

                                                        {{-- Form Upload --}}
                                                        <form
                                                            action="{{ route('client.uploadBukti',$pemesanan->id_pemesanan) }}"
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
                                                <div class="col-lg-12 p-0 mb-3">
                                                    <div class="card mb-3">
                                                        <div class="card-body d-flex justify-content-center">
                                                            <img class="img-thumbnail" style="widht:auto; max-height:300px"
                                                                src="{{ asset('bukti_pembayaran/' . $pemesanan->bukti_pembayaran) }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="d-grid">
                                                        <a href="{{ asset('ETicket/'.$pemesanan->TicketCategory->e_ticket) }}" class="btn btn-dark"  download> 
                                                            Get Your Ticket Here ! 
                                                        </a>
    
                                                    </div>
                                                 
                                                </div>
                                            @endif
                                            {{-- Upload Image --}}

                                        </div>
                                    </div>
                                    <div class="col-md-5 offset-lg-1 p-3 card shadow">
                                        <div class="row">
                                            <h3 class="fw-normal">Concert Information</h3>
                                            <hr>
                                            <div class="d-flex justify-content-center">
                                                <img class="img-fluid"
                                                    src="{{ asset('ticket_image/' . $pemesanan->Ticket->ticket_image) }}"
                                                    alt="" style="max-height:300px; width:auto;">
                                               
                                            </div>
                                            
                                            <div class="my-3">
                                                <h5>{{$pemesanan->Ticket->ticket_name}}</h5>
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
