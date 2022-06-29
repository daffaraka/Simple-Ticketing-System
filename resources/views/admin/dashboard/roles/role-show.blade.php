@extends('admin.layout.layout-main')


<title>Detail Role</title>

@section('content')
    <div class="container p-5 text-dark">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="text-center text-white"> Show Role</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mb-5" href="{{ route('role.index') }}"> Back</a>
                </div>
            </div>
        </div>


        <div class="row bg-dark text-light shadow-lg rounded p-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if (!empty($rolePermissions))
                        @foreach ($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                    @else
                        <label class="label label-danger">No Permission added</label>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
