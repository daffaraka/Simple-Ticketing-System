@extends('admin.layout.layout-main')
<title>Artist</title>
@section('content')
<div class="container py-1">
    <div class="row mb-2 justify-content-center">
        <div class="col-lg-12 col-md-6 p-2">
            <a href="{{route('artist.create')}}"><button class="btn btn-primary">
                <i class="fa fa-user-plus"></i>
                Add Artist</button>
            </a> 
           <table class="table table-dark table-striped text-start shadow">
               <thead>
                   <tr>
                       <th class="px-2">#</th>
                       <th class="px-2">Artist Name</th>
                       <th class="px-2">Artist Dom</th>
                       <th class="px-2">Action</th>
                   </tr>
               </thead>
               <tbody class="table-light">
                  
                   @foreach ($artist as $a)
                        <tr>
                            <td>{{$a->id_artist}}</td>
                            <td>{{$a->artist_name}}</td>
                            <td>{{$a->artist_dom}}</td>
                            <td>
                                <a href="{{route('artist.edit',$a->id_artist)}}" class="btn btn-dark">Edit</a>
                                <a href="{{route('artist.destroy',$a->id_artist)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                   @endforeach
                  
               </tbody>
           </table>
        </div>
    </div>
</div>
  
@endsection