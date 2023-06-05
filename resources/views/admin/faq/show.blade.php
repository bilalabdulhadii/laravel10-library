@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', $data->subject)

@section('head')
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><span style="font-weight: bold">{{$data->subject}}</span></h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.faq')}}">FAQ</a></li>
                    <li class="active">{{$data->subject}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <!-- box-header -->
                    <div class="box-header">
                        <h3 class="box-title">Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body padding">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th style="width: 150px">Id</th>
                                <td>{{$data->id}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Status</th>
                                <td>{{$data->status}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Subject</th>
                                <td>{{$data->subject}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Question</th>
                                <td>{{$data->question}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Answer</th>
                                <td>{{$data->answer}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Created Date</th>
                                <td>{{$data->created_at}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Update Date</th>
                                <td>{{$data->updated_at}}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{route('admin.faq.edit', ['id' => $data->id])}}" class=" btn btn-info btn-sm">Edit</a>
                        <a href="{{route('admin.faq.delete', ['id' => $data->id])}}" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure, you want to delete the faq: {{$data->subject}} .!?')">
                            Delete</a>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
@endsection

@section('footer')
@endsection
