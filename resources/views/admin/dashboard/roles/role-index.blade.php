@extends('admin.layout.layout-main')
<title>Role Management</title>


@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center ">
                <h2 class="text-white">Role Management</h2>
            </div>
            <div class="pull-right">
        
                <a class="btn btn-success mb-3" href="{{ route('role.create') }}"> Create New Role</a>
           
            </div>
        </div>
    </div>
    
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    
    <table class="table table-dark table-striped shadow">
      <tr>
         <th>No</th>
         <th>Name</th>
         <th width="280px">Action</th>
      </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
               
                    <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}">Edit</a>
              
                    <a href="{{route('role.destroy',$role->id)}}" class="btn btn-danger">Delete</a>
                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!} --}}
              
            </td>
        </tr>
        @endforeach
    </table>
    
    
    {!! $roles->render() !!}
    
    
</div>

@endsection