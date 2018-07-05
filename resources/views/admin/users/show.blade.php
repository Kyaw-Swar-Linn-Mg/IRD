@extends('admin.layouts.master')

@section('title')
    User Details
@stop

@section ('style')

@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Management
            <small>User Details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Detail</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-bordered table-responsive">
                    <tbody>
                        <tr>
                            <th>User Name</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{$user->role}}</td>
                        </tr>
                        <tr>
                            <th>Joined Date</th>
                            <td>{{ $user->created_at->format('d M Y - H:i:s  A') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->
@stop

@section('script')

@stop