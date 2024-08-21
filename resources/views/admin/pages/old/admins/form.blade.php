@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Users Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
<div class="row">

    <div class="col-md-12"> 
        <div class="card card-create">
        <div class="card-header">
            <h3 class="card-title">Add User</h3>
        </div>
        @if(Session::has('message'))
        <div class="alert alert-danger">This email is already User</div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ $user->id ? route('user.update', $user->id) : route('user.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if ($user->id)
                    @method('Put')
                    <input type="text" name="edit" value="1" hidden>
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>name </label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                placeholder="Enter ...">
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>password </label>
                            <input type="password" name="password" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>position</label>
                            <select name="position" class="form-control select2bs4" style="width: 100%;">
                                @if ($user->id)
                                    <option value="{{ $user->roles->first()->name }}" selected hidden>
                                        {{ $user->roles->first()->name }} </option>
                                @endif
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
             </form>
        </div>
        </div>
    </div>
</div>
<!-- /.card -->


@section('js')
    <script>
        $(function() {
            $('#summernote1').summernote({
                height: 200,
            });
            $('#summernote2').summernote({
                height: 200,
            });
        })

    </script>
@endsection
@endsection
