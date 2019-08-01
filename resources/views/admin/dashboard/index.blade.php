@extends('admin.layouts.adminlayout')
@section('content')
<div id="page-wrapper">
    <div class="header">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Customers</li>
        </ol>
    </div>
    <div id="page-inner">
        <!-- /. ROW  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Customers List <a href="{{route('add_customer')}}" class="btn btn-primary">Add Customer</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;?>
                                @foreach($customers as $row)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->status}}</td>
                                    <td><a href="{{route('activities',$row->customer_id)}}" class="btn btn-primary">Activities</a></td>
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