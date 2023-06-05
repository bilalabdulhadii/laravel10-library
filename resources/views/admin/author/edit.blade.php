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
                <h1><span style="font-weight: bold">{{$data->fname}} {{$data->lname}}</span></h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.author')}}">Author</a></li>
                    <li class="active">Edit {{$data->name}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Author Information</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.author.update', ['id' => $data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" name="fname" value="{{$data->fname}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" name="lname" value="{{$data->lname}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="birth_date">Birth year</label>
                                        <select class="form-control" name="birth_date">
                                            <option value="{{null}}" {{$birth_date == null ? 'selected' : 'hidden'}}>Select birth date</option>
                                            @for ($year = date('Y'); $year >= 1000; $year--)
                                                <option {{$birth_date == $year ? 'selected' : ''}} value="{{$year}}">{{$year}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="death_date">Death year</label>
                                        <select class="form-control" name="death_date">
                                            <option value="{{null}}" {{$death_date == null ? 'selected' : 'hidden'}}>Select death date</option>
                                            @for ($year = date('Y'); $year >= 1000; $year--)
                                                <option {{$death_date == $year ? 'selected' : ''}} value="{{$year}}">{{$year}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea style="resize: none" class="form-control" type="text"
                                          name="description" placeholder="description">{{$data->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="image" class="custom-file-label">Image</label>
                                <div class="input-group form-control">
                                    <div>
                                        <input type="file" class="custom-file-input" name="image">
                                    </div>
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
