@extends('admin.layouts.adminlayout')
@section('content')
<div id="page-wrapper">
    <div class="header">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Activities</li>
        </ol>
    </div>
    <div id="page-inner">
        <!-- /. ROW  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                       {{$customer_details['name']}} Activity List <a href="{{route('add_activities',$customer_id)}}" class="btn btn-primary">Add Activity</a>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Activity Type</th>
                                    <th>Time</th>
                                    <th>Description</th>
                                    <th>Next Activity Description</th>
                                    <th>Next Activity Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($activities as $row)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$row->activity_type}}</td>
                                    <td>{{$row->time}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>{{$row->next_act_desc}}</td>
                                    <td>{{$row->next_act_time}}</td>
                                </tr>
                                    <?php $i++;?>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
@endsection