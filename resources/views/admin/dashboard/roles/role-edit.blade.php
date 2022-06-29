@extends('admin.layout.layout-main')
<title>Role Management</title>


@section('content')
    <div class="container p-5 text-dark">
        <div class="row">
            <div class="col-lg-12 m-0 ml-0 p-0">
                <div class="pull-left text-center">
                    <h2 class="text-white">Edit Role</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-3" href="{{ route('role.index') }}"> Back</a>
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


        <form action="{{ route('role.update', $role->id) }}" method="POST">
            <div class="row shadow-lg rounded p-3 bg-light">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>

                        <input type="text" class="form-control" name="name" placeholder="name" value="{{$role->name}}">

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br />
                        @foreach ($permission as $value)
                            <label>

                                <input type="checkbox" class="form-check-input" name="permission[]" id=""
                                    value="checkedValue">


                                {{-- {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }} --}}
                                {{ $value->name }}</label>
                            <br />
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>


    </div>


@endsection
