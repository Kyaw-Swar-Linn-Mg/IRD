@extends('admin.layouts.master')

@section('title')
    Edit Category
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="#">Category</a></li>
            <li>Edit</li>
        </ol>
    </section>

    <div class="clearfix"></div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <!-- form -->
                <form action="{{ route('dashboard.category.update', $category->id) }}" method="POST" role="form">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-user"></i></h3>
                        </div>

                        <div class="box-body">
                            <div class="col col-md-6 col-md-offset-3">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" required autofocus value="{{$category->name}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Have Sub Category?</label>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary @if($category->sub_category == true) {{'active'}} @endif">
                                            <input type="radio" name="sub_category" value="1" @if($category->sub_category == true) {{'checked'}} @endif> Yes
                                        </label>
                                        <label class="btn btn-primary @if($category->sub_category == false) {{'active'}} @endif">
                                            <input type="radio" name="sub_category" value="0" @if($category->sub_category == false) {{'checked'}} @endif> No
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary form-control">Save Change</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </form>
            </div>
            <!-- /.col-ms-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.content -->
@stop