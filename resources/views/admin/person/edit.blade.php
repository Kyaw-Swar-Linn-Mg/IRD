@extends('admin.layouts.master')

@section('title')
    Edit Person
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Person
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="#">Person</a></li>
            <li>Edit</li>
        </ol>
    </section>

    <div class="clearfix"></div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <!-- form -->
                <form action="{{ route('dashboard.person.update', $person->id) }}" method="POST" role="form">
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
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $person->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }} has-feedback">
                                    <label for="position">Position</label>
                                    <input id="position" type="text" class="form-control" name="position" value="{{ $person->position }}" required autofocus>
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('office_phone') ? ' has-error' : '' }} has-feedback">
                                    <label for="office_phone">Office Phone</label>
                                    <input id="office_phone" type="text" class="form-control" name="office_phone" value="{{ $person->office_phone }}" required autofocus>
                                    @if ($errors->has('office_phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('office_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('hand_phone') ? ' has-error' : '' }} has-feedback">
                                    <label for="hand_phone">Hand Phone</label>
                                    <input id="hand_phone" type="text" class="form-control" name="hand_phone" value="{{ $person->hand_phone }}" required autofocus>
                                    @if ($errors->has('hand_phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('hand_phone') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} has-feedback">
                                    <label for="state">State</label>
                                    <input id="state" type="text" class="form-control" name="state" value="{{ $person->state }}" required autofocus>
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }} ">
                                    <label for="category_id">Select Category</label>
                                    <select id="category_id" name="category_id" class="select2 form-control" style="width: 100%;" required tabindex="-1" aria-hidden="true">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if($person->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('sub_category_id') ? ' has-error' : '' }} ">
                                    <label for="sub_category_id">Select Category</label>
                                    <select id="sub_category_id" name="sub_category_id" class="select2 form-control" style="width: 100%;" required tabindex="-1" aria-hidden="true">
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{$subCategory->id}}" @if($person->sub_category_id == $subCategory->id) selected @endif>{{$subCategory->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('sub_category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sub_category_id') }}</strong>
                                        </span>
                                    @endif
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