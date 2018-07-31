@extends('admin.layouts.master')

@section('title')
  Create New Position
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create New Position
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{ route('dashboard.position.index') }}">Position</a></li>
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
                    <form action="{{ route('dashboard.position.store') }}" method="POST" role="form">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
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