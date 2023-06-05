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
                <h1>{{$data->subject}}</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.message')}}">Message</a></li>
                    <li class="active">Message Details</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box ">
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
                                <th style="width: 150px">Name</th>
                                <td>{{$data->name}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Email</th>
                                <td>{{$data->email}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Phone</th>
                                <td>{{$data->phone}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Ip</th>
                                <td>{{$data->ip}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Subject</th>
                                <td>{{$data->subject}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Message</th>
                                <td>{{$data->message}}</td>
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
                        <td><a href="{{route('admin.message.delete', ['id' => $data->id])}}" class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure, you want to delete {{$data->name}} message .!?')">
                                Delete</a>
                    </div>
                </div>

                <div class="box ">
                    <!-- box-header -->
                    <div class="box-header bg-info">
                        <form role="form" id="myForm" action="{{route('admin.message.update', ['id' => $data->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea class="form-control" style="resize: none" name="reply">{{$data->reply}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <textarea class="form-control" style="resize: none" name="note">{{$data->note}}</textarea>
                            </div>

                            <div class="box-footer">
                                <button type="submit" id="submitButton" class="btn btn-primary">Update Note</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body padding">
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
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Perform your form processing/validation logic here
            this.submit();
            // Close the tab or window
            setTimeout(function() {
                window.close();
            }, 1000);
        });
    </script>
@endsection
