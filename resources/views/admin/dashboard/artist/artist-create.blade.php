@extends('admin.layout.layout-main')
@section('title', 'Add Artist')
@section('content')
    <div class="container">
        <div class="row p-2">
            <div class="col-lg-8 bg-white p-4 mx-5 rounded shadow">
                <form method="post" action="{{ route('artist.store') }}">
                    @csrf
                    <div class="label">Nama Artis</div>
                    <input class="form-control" type="text" name="artist_name" id="artist_name">
                    <div class="label">Asal Artis</div>
                    <input class="form-control" type="text" name="artist_dom" id="artist_dom">
                    <button type="submit" class="btn btn-primary my-3"> <i class="fa fa-i-plus"></i> Add Artist </button>
                </form>
            </div>

        </div>
    </div>


@endsection
