@extends('admin.layouts.main')
@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Profile</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">User Profile</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid profile_img_page img-circle"
                       src="{{$user->profileImage??asset("assets/admin.png")}}"
                       alt="User profile picture">
                </div>
                 <h3 class="profile-username text-center mb-3">{{$user->name}}</h3>
                <ul class="nav nav-pills d-block">
                  {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">My Articles</a></li> --}}
                  {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>--}}
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li> 
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  {{-- <div class="active tab-pane" id="activity">
                    @foreach ($articales as $article)
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                          <a href="#">{{$article->title}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly -{{$article->created_at->format('y:m:d')}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {{
                        $articale->articale
                      }}
                      </p>
                    </div>
                    <!-- /.post -->
                    @endforeach

                  </div> --}}
            
          

                  <div class="active tab-pane" id="settings">

                    <form  action="{{route('user.update',$user->id)}}"  method="POST" enctype="multipart/form-data" class="form-horizontal">
                      @csrf
                      @method('PUT')
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" value="{{$user->email}}" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                         <label for="profile_image" class="col-sm-2 col-form-label">Change image</label>
                         <div class="col-sm-10">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input form-control" id="profile_image" name="image">
                              <label class="custom-file-label" for="profile_image">Choose file</label>
                            </div>
                          </div>
                         </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Change Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password" id="inputSkills" placeholder="*********">
                        </div>
                      </div>
                      {{-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                              <h6>
                                Fabrica-Dev is not responceable about your changes
                              </h6>
                            </label>
                          </div>
                        </div>
                      </div> --}}

                        <button class="form-control btn btn-success custom-submit_button" type="submit">Submit</button>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
          </div>
        </div>
@endsection