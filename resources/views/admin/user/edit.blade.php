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
                    <li class="active">Edit {{$data->name}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">User Information</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.user.update', ['id' => $data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->has('custom_error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('custom_error') }}
                            </div>
                        @endif

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password" value="{{$data->password}}" required>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role">
                                    <option {{$data->role == 'Member' ? 'selected' : ''}}>Member</option>
                                    <option {{$data->role == 'Librarian' ? 'selected' : ''}}>Librarian</option>
                                    <option {{$data->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender">
                                    @if($data->gender == null)
                                        <option value="{{null}}" selected>Select one...</option>
                                    @endif
                                    <option {{$data->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                    <option {{$data->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" class="form-control" name="birth_date" value="{{$data->birth_date}}">
                            </div>

                            <div class="form-group">
                                <label for="image" class="custom-file-label">Image</label>
                                <div class="input-group form-control">
                                    <div>
                                        <input type="file" class="custom-file-input" name="image">
                                    </div>
                                    {{--<label class="custom-file-label">Choose image file</label>--}}
                                    <div class="checkbox">
                                        <label style="color: red">
                                            <input type="checkbox" name="del_image">Delete the existing image
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                    <!-- /.form start -->
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
