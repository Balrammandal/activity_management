@extends('admin.layouts.adminlayout')
@section('content')
    <div id="page-wrapper" >
        <div class="header">
            <h1 class="page-header">
                Add <small>Activity</small>
            </h1>
        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Activity Add
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
                                    <form role="form" action="{{route('save_activities',$customer_id)}}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label>Activity Type</label>
                                            <select class="form-control" name="activity_type">
                                                <option value="Call">Call</option>
                                                <option value="Email"> Email</option>
                                                <option value="Visit"> Visit</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Time</label>
                                            <input type="text" class="form-control" name="time" placeholder="Enter time">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                        </div>
                                        <div class="form-group">
                                            <label>Next Activity Time</label>
                                            <input type="text" class="form-control" name="next_act_time" placeholder="Enter time">
                                        </div>
                                        <div class="form-group">
                                            <label> Next Activity Description</label>
                                            <input type="text" class="form-control" name="next_act_desc" placeholder="Enter Description">
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection