@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'New Event')

@section('head')
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>New Event</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.event')}}">Event</a></li>
                    <li class="active">New Event</li>
                </ol>
            </section>
            <!-- Main content -->

            <section class="content">
                <div class="box box-primary">
                    <!-- box-header -->
                    <div class="box-header">
                        <h3 class="box-title">Event Details</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.event.store')}}" method="post">
                        @csrf

                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" class="form-control" name="title" placeholder="event title">
                            </div>

                            <div class="form-group">
                                <label for="content_text">Content</label>
                                <textarea id="content_text" style="resize: none" class="form-control" name="content_text" placeholder="content"></textarea>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
                                <script>var editor = new FroalaEditor('#content_text');</script>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" selected>Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
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
