@extends('admin.layouts.master')

@section('title')
    Category List
@stop

@section ('style')

@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Category List</li>
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
                        <th>State</th>
                        <th>Have Sub Category?</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $index=1; ?>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$index}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->state}}</td>
                            <td>
                                @if($category->sub_category == true)
                                    Yes
                                    @else
                                    No
                                    @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_{{$category->id}}"><span class="fa fa-trash"></span></button>
                                <a class="btn btn-primary btn-sm" href="{{route('dashboard.category.edit',['id'=>$category->id])}}"><span class="fa fa-edit"></span></a>
                            </td>
                        </tr>
                        <?php $index++ ?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    @foreach($categories as $category)
        <!-- Delete Confirm Modal -->
            <div class="modal fade" id="modal_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="alert_ModalLabel">
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
                            <form action="{{ route('dashboard.category.destroy', $category->id) }}" method="POST"
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