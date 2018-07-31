@extends('admin.layouts.master')

@section('title')
    Person List
@stop

@section ('style')

@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Person List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Person List</li>
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
                        <th>Position</th>
                        <th>Office Phone</th>
                        <th>Hand Phone</th>
                        <th>State</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $index=1; ?>
                    @foreach($people as $person)
                        <tr>
                            <td>{{$index}}</td>
                            <td>{{$person->name}}</td>
                            <td>{{$person->personPosition['name']}}</td>
                            <td>{{$person->office_phone}}</td>
                            <td>{{$person->hand_phone}}</td>
                            <td>{{$person->state}}</td>
                            <td>{{$person->category->name}}</td>
                            <td>{{$person->subCategory->name}}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_{{$person->id}}"><span class="fa fa-trash"></span></button>
                                <a class="btn btn-primary btn-sm" href="{{route('dashboard.person.edit',['id'=>$person->id])}}"><span class="fa fa-edit"></span></a>
                            </td>
                        </tr>
                        <?php $index++ ?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    @foreach($people as $person)
        <!-- Delete Confirm Modal -->
            <div class="modal fade" id="modal_{{$person->id}}" tabindex="-1" role="dialog" aria-labelledby="alert_ModalLabel">
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
                            <form action="{{ route('dashboard.person.destroy', $person->id) }}" method="POST"
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