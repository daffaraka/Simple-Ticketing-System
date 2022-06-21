@extends('admin.layout.layout-main')
@section('title','Add Venue')
@section('content')
<div class="container">
    <div class="row p-2">
        <div class="col-lg-8 bg-white p-4 mx-5 rounded shadow">
            <form method="post" action="{{route('venues.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="label">Venue Name</div>
                    <input class="form-control" type="text" name="venue_name" id="artist_name">    
                </div>
                <div class="mb-2">
                    <div class="label">Venue Capacity</div>
                    <input class="form-control" type="number" name="venue_capacity" id="artist_dom">    
                </div>
                <div class="mb-2">
                    <div class="label">Location</div>
                    <input class="form-control" type="text" name="venue_location" id="artist_dom">    
                </div>
                <div class="mb-2">
                    <div class="label">Venue Pic</div>
                    <input type="file" name="venue_pict" id="venue_pict" class="form-control" >    
                </div>
                    <button type="submit" class="btn btn-primary my-3"> <i class="fa fa-i-plus"></i> Add Artist </button>
            </form>
        </div>
      
    </div>
</div>


@endsection