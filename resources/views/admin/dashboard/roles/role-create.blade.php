@extends('admin.layout.layout-main')
<title>Create Role</title>
@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-center text-dark">Create New Role</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-2" href="{{ route('role.index') }}"> Back</a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="row bg-light rounded p-3">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong class="text-dark">Name:</strong>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                        {{-- {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!} --}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong class="text-dark">Permission:</strong>
                        <br />
                        @foreach ($permission as $value)
                            {{-- <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                {{ $value->name }}</label> --}}
                            <label>

                                <input type="checkbox" class="form-check-input" name="permission[]" 
                                    value="{{$value->id}}">
                                {{$value->name}}

                            </label>
                            <br />
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
        {{-- {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!} --}}

        {{-- {!! Form::close() !!} --}}


    </div>

@endsection
