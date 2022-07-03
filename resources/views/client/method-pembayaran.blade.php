@extends('client.client-layout')
<title>Payment Method</title>
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

                                    <h1>Payment Method</h1>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <div class="row d-flex justify-content-center">

                                                <div class="col-lg-2 px-2 card shadow">
                                                    <a href="{{ route('client.buktiPembayaran', $pemesanan->id_pemesanan) }}">
                                                        <img class="img-thumbnail border-0 mb-2" src="{{ asset('client/images/dana.png') }}"
                                                            alt="">
                                                    </a>
                                                </div>


                                                {{-- <div class="col-lg-12 px-0">
                                                    <div class="row px-2 py-3">
                                                        <div class="col">
                                                           
                                                        </div>
                                                    </div>

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
    @endsection
