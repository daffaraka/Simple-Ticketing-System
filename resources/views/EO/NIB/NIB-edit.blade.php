@extends('admin.layout.layout-main')
<title>Edit NIB</title>
@section('content')
    <div class="container ">
        <div class="bg-gray-200 min-height-300 p-5">
            <div class="card rounded-1">

                <div class="row px-3 py-3">
                    <div class="col-lg-12">
                        <h5 class="card-title">Your NIB. </h5>
                        <hr>
                        <div class="d-flex justify-content-center my-3">
                            <img class="img-thumbnail w-25" src="{{ asset('NIB/' . $nib->nib_pict) }}"
                                alt="Nib pict of {{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="col">
                        <form action="{{ route('eo.nib.update',$nib->id_nib) }}" method="POST" enctype="multipart/form-data"
                            class="p-0">
                            @csrf
                            <div class="mb-3">

                                <input class="form-control" type="file" name="nib_pict">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>

                    </div>
                </div>
                {{-- @if (empty($nib))
                    <div class="card-body">
                        <h5 class="card-title">You dont add NIB Certificate yet. </h5>
                        <form action="{{ route('eo.nib.store') }}" method="POST" enctype="multipart/form-data"
                            class="p-0">
                            @csrf
                            <div class="mb-3">

                                <input class="form-control" type="file" name="nib_pict">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>

                    </div>
                @else
                    <div class="card-body">
                        <h5 class="card-title">Your NIB. </h5>
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid" style="max-width:700px;" src="{{ asset('NIB/' . $nib->nib_pict) }}"
                                alt="Nib pict of {{ Auth::user()->name }}">
                        </div>


                    </div>

                    <div class="d-grid gap-2 px-5">
                        <a href="{{ route('eo.nib.edit', $nib->id_nib) }}" class="btn btn-primary" type="button">Edit</a>
                        <a href="{{ route('eo.nib.destroy', $nib->id_nib) }}" class="btn btn-danger"
                            type="button">Delete</a>
                    </div>
                @endif --}}





            </div>
        </div>
    </div>
@endsection
