@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'New User')

@section('head')
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>New User</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.user')}}">User</a></li>
                    <li class="active">New User</li>
                </ol>
            </section>
            <!-- Main content -->

            <section class="content">
                <div class="box box-primary">
                    <!-- box-header -->
                    <div class="box-header">
                        <h3 class="box-title">User Information</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->has('custom_error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('custom_error') }}
                            </div>
                        @endif
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" name="name" placeholder="user name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password" placeholder="password" required>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role">
                                    <option>Member</option>
                                    <option>Librarian</option>
                                    <option>Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="{{null}}">Select One...</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" class="form-control" name="birth_date">
                            </div>

                            <div class="form-group">
                                <label for="image" class="custom-file-label">Image</label>
                                <div class="input-group form-control">
                                    <div>
                                        <input type="file" class="custom-file-input" name="image">
                                    </div>
                                    <label class="custom-file-label">Choose image file</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    <!-- /.form end -->
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
