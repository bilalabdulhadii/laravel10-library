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
                    <li class="active">Edit {{$data->subject}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Question Details</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.faq.update', ['id' => $data->id])}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" value="{{$data->subject}}">
                            </div>

                            <div class="form-group">
                                <label for="question">Question</label>
                                <textarea style="resize: none" class="form-control" type="text"
                                          name="question" placeholder="question">{{$data->question}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <textarea style="resize: none" class="form-control" type="text"
                                          name="answer" placeholder="answer">{{$data->answer}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option {{$data->status == 'Active' ? 'selected' : ''}} value="Active">Active</option>
                                    <option {{$data->status == 'Draft' ? 'selected' : ''}} value="Draft">Draft</option>
                                    <option {{$data->status == 'Pending' ? 'selected' : ''}} value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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
