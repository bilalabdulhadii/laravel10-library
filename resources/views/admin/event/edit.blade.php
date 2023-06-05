@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', $data->title)

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
                <h1><span style="font-weight: bold">{{$data->title}}</span></h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.event')}}">Event</a></li>
                    <li class="active">Edit {{$data->title}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Event Details</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.event.update', ['id' => $data->id])}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" class="form-control" name="title" value="{{$data->title}}">
                            </div>

                            <div class="form-group">
                                <label for="content_text">Content</label>
                                <textarea id="content_text" style="resize: none" class="form-control" name="content_text" placeholder="content">
                                    {{$data->content}}
                                </textarea>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
                                <script>var editor = new FroalaEditor('#content_text');</script>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{$data->status == true ? 'selected' : ''}}>Enable</option>
                                    <option value="0" {{$data->status == false ? 'selected' : ''}}>Disable</option>
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
    <!-- Add jQuery and Bootstrap JavaScript -->
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
    <!-- Add Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-value').select2();

            $('#searchForm').submit(function(e) {
                e.preventDefault();
                var searchTerm = $('#searchInput').val();
                $('.select-value').val(null).trigger('change'); // Clear previous selection
                $('.select-value').select2('open');
                $('.select2-search__field').val(searchTerm);
            });
        });
    </script>
@endsection
