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
                    <li><a href="{{route('admin.author')}}">Author</a></li>
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
                                <th style="width: 150px">First Name</th>
                                <td>{{$data->fname}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Last Name</th>
                                <td>{{$data->lname}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Birth - Death</th>
                                <td>{{$data->dates}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Description</th>
                                <td>{{$data->description}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Books</th>
                                <td>
                                    @foreach($books as $book)
                                        <li>{{$book->title}}</li>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Image</th>
                                <td>
                                    @if ($data->image)
                                        <img style="height: 200px" src="{{Storage::url($data->image)}}" alt="image"/>
                                    @else
                                        <img src="{{asset('assets/images/100x100/Author.png')}}" alt="image"/>
                                        {{--<img src="{{asset('assets/admin/images/contact-img.jpg')}}" alt="Image"/>--}}
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{route('admin.author.edit', ['id' => $data->id])}}" class=" btn btn-info btn-sm">Edit</a>
                        <a href="{{route('admin.author.delete', ['id' => $data->id])}}" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure, you want to delete the author: {{$data->name}} .!?')">
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
