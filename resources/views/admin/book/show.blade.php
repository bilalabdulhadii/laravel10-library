@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', $data->title)

@section('head')
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><span style="font-weight: bold">{{$data->title}}</span></h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.book')}}">Book</a></li>
                    <li class="active">{{$data->title}}</li>
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
                                <th style="width: 150px">Title</th>
                                <td>{{$data->title}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">ISBN</th>
                                <td>{{$data->isbn}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Author Name</th>
                                <td>
                                    @if ($data->authorId)
                                        {{$data->authorId->fname}} {{$data->authorId->lname}}
                                    @else
                                        None
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Parent Category</th>
                                <td>
                                    @if($data->categories->count() > 0)
                                        @foreach ($data->categories as $category)
                                            <li>{{ $category->title }}</li>
                                        @endforeach
                                    @else
                                        None
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Description</th>
                                <td>{{$data->description}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Quantity Available</th>
                                <td>{{$data->quantity_available}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Language</th>
                                <td>{{$data->language}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Publication Year</th>
                                <td>{{$data->publication_year}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Edition</th>
                                <td>{{$data->edition}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Status</th>
                                <td>
                                    @if ($data->status)
                                        Enable
                                    @else
                                        Disable
                                    @endif
                                </td>
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
                                    @if ($data->image)
                                        <img style="height: 200px" src="{{Storage::url($data->image)}}" alt="image"/>
                                    @else
                                        <img src="{{asset('assets/images/100x100/Book.png')}}" alt="image"/>
                                  @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{route('admin.book.edit', ['id' => $data->id])}}" class=" btn btn-info btn-sm">Edit</a>
                        <a href="{{route('admin.book.delete', ['id' => $data->id])}}" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure, you want to delete the book: {{$data->title}} .!?')">
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
