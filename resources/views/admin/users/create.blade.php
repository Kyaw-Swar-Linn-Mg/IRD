@extends('admin.layouts.master')

@section('title')
  Create New User
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create New User
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{ route('dashboard.users.index') }}">User</a></li>
        <li>Create</li>
      </ol>
    </section>

    <div class="clearfix"></div>

    <div class="content">
      <div class="row">
        <div class="col-sm-12">
          <!-- Input addon -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i></h3>
            </div>

            <div class="box-body">
                <div class="col col-lg-6 col-lg-offset-3">
                    <form action="{{ route('dashboard.users.store') }}" method="POST" role="form">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                            <label for="name">User Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email"  value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="password-confirm">Retype password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }} ">
                            <label for="role"><span class="fa fa-key"></span> Select Role</label>
                            <select id="role" name="role" class="select2 form-control" style="width: 100%;" required tabindex="-1" aria-hidden="true">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            @if ($errors->has('role'))
                                <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                            @endif
                        </div>

                        <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary form-control">Create</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
                </div>
            </div>
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </div>
@stop