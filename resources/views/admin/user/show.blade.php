@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', $data->name)

@section('head')
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><span style="font-weight: bold">{{$data->name}}</span></h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.user')}}">User</a></li>
                    <li class="active">{{$data->name}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box ">
                    <!-- box-header -->
                    <div class="box-header">
                        <h3 class="box-title">Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body padding">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th style="width: 150px">Id</th>
                                <td>{{$data->id}}</td>
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
                                <th style="width: 150px">Password</th>
                                <td>{{$data->password}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Role</th>
                                <td>{{$data->role}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Gender</th>
                                <td>
                                    @if($data->gender !== null)
                                        {{$data->gender}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Birth Date</th>
                                <td>{{$data->birth_date}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Created Date</th>
                                <td>{{$data->created_at}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Update Date</th>
                                <td>{{$data->updated_at}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Image</th>
                                <td>
                                    @if ($data->profile_photo_path)
                                        <img style="height: 200px" src="{{Storage::url($data->profile_photo_path)}}" alt="image"/>
                                    @else
                                        <img src="{{asset('assets/images/100x100/User.png')}}" alt="image"/>
                                        {{--<img src="{{asset('assets/admin/images/contact-img.jpg')}}" alt="Image"/>--}}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{route('admin.user.edit', ['id' => $data->id])}}" class=" btn btn-info btn-sm">Edit</a>
                        <a href="{{route('admin.user.delete', ['id' => $data->id])}}" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure, you want to delete the user: {{$data->name}} .!?')">
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
