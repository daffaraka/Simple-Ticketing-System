@extends('admin.layout.layout-main')
<title>Venue</title>
@section('content')
<div class="container py-1">
    <div class="row mb-2 justify-content-center">
        <div class="col-lg-12 col-md-6 p-2">
            <a href="{{route('venues.create')}}"><button class="btn btn-primary">
                <i class="fa fa-user-plus"></i>
                Add Venue</button>
            </a> 
           <table class="table table-dark table-striped text-start shadow">
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
               <tbody class="table-light">
                  <?php $i=1 ?>
                   @foreach ($venue as $a)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$a->venue_name}}</td>
                            <td>{{$a->venue_capacity}}</td>
                            <td>{{$a->venue_location}}</td>
                            <td class="w-25">
                                <img src="{{asset('Venue/'.$a->venue_pict)}}" alt="" class="img-thumbnail" >
                               </td>
                            <td>
                                <a href="{{route('venues.edit',$a->id_venue)}}" class="btn btn-dark">Edit</a>
                                <a href="{{route('venues.destroy',$a->id_venue)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                   @endforeach
                  
               </tbody>
           </table>
        </div>
    </div>
</div>
  
@endsection