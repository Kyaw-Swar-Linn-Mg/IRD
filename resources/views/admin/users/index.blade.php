@extends('admin.layouts.master')

@section('title')
    User List
@stop

@section ('style')

@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Management
            <small>User List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if(Session::has('flash'))
            <div class="alert alert-success alert-flash">
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{Session::get('flash')}}
            </div>
        @endif

        <div class="box box-primary">
            <div class="box-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Join Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $index=1; ?>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$index}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->role == "user")
                                    <label class="label label-primary">User</label>
                                @elseif($user->role == "admin")
                                    <label class="label label-danger">Admin</label>
                                @endif
                            </td>
                            <td>{{$user->created_at->format('d-M-Y h:m:i A')}}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_{{$user->id}}"><span class="fa fa-trash"></span></button>
                                <a class="btn btn-primary btn-sm" href="{{route('dashboard.users.edit',['id'=>$user->id])}}"><span class="fa fa-edit"></span></a>
                                <a class="btn btn-success btn-sm" href="{{route('dashboard.users.show',['id'=>$user->id])}}"><span class="fa fa-eye"></span></a>
                            </td>
                        </tr>
                        <?php $index++ ?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    @foreach($users as $user)
        <!-- Delete Confirm Modal -->
            <div class="modal fade" id="modal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="alert_ModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><span class="fa fa-info-circle"></span> Confirmation</h4>
                        </div>
                        <div class="modal-body">
                            Are you sure want to delete?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST"
                                  style="display: inline;">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-primary" id="delete-btn">Yes</button>
                            </form>
                            <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- /.content -->
@stop

@section('script')

@stop