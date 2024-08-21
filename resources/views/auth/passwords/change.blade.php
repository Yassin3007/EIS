@extends('dashboard.layout.main')
@section('content')

        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper">
            <!-- START PAGE CONTENT -->
            <div class="content">

                <!-- START JUMBOTRON -->
                <div class="jumbotron" data-pages="parallax">
                    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                        <div class="inner">
                            <!-- START BREADCRUMB -->
                            <ul class="breadcrumb">
                                <li>
                                    <p>Admin</p>
                                </li>
                                <li><a href="#" class="active">Change Password</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- END JUMBOTRON -->

                <!-- START CONTAINER FLUID -->
                <div class="container-fluid container-fixed-lg">
                    <!-- START PANEL -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                              Change Password
                            </div>
                        </div>
                        <div class="panel-body">
                        <form role="form" method="POST" action="{{route('change.password.function',$user->id)}}">
                                @csrf
                                @method('PUT') 
                                
                                <label> {{$user->email}} &nbsp; </label>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            @if(session('error'))
                                             <div class="alert alert-danger">{{session('error') }}</div>
                                            @endif
                                            <label> old password &nbsp; </label>
                                            <input type="password" class="form-control" name="oldpassword" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label> new password &nbsp; </label>
                                            <input type="password" class="form-control" name="newpassword" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            @if(session('error2'))
                                             <div class="alert alert-danger">{{session('error2') }}</div>
                                            @endif
                                            <label> conferm new password &nbsp; </label>
                                            <input type="password" class="form-control" name="confermpassword" required>
                                        </div>
                                    </div>
                                </div>

                         <button class="btn btn-primary btn-cons"     style=" float:center" >Change Password</button>
                       </form>                        
                    </div>
                </div>
            </div>
@endsection
@section('js')
<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endsection
