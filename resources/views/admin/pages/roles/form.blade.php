@extends('admin.layouts.main')
@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add role</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.view') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Roles Form</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
{{-- error message --}}
@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif

<div class="row">

    <div class="col-md-12"> 
        <div class="card card-create">
        <div class="card-header">
            <h3 class="card-title">Add Role</h3>
        </div>
        @if(Session::has('message'))
        <div class="alert alert-danger">This email is already Role</div>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ $role->id ? route('roles.update', $role->id) : route('roles.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if ($role->id)
                    @method('Put')
                    <input type="text" name="edit" value="1" hidden>
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>name </label>
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control"
                                placeholder="Enter ...">
                        </div>
                    </div>


                  



                </div>
               
                <div class="row">
                  <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                      <label>permissions <span class="required_class">*</span></label>
                      <select class="ui fluid search dropdown" name="permissions[]" multiple="">
    
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}"
                              {{$role->permissions->contains($permission->id)?"selected":""}}
                              >{{ $permission->name }}</option>
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

@endsection


