@extends('admin.layouts.adminlayout')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">
                User <small>Login</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Users</a></li>
                <li class="active">User Login</li>
            </ol>

        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Login
                        </div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="{{route('user_login_submit')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                        </div>
                                        <button type="submit" class="btn btn-default">Login</button>
                                    </form>
                                    <a href="{{route('user_register')}}">Click Here For Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection