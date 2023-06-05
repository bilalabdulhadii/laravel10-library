@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'New Category')

@section('head')
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Add Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>New Category</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.category')}}">Category</a></li>
                    <li class="active">New Category</li>
                </ol>
            </section>
            <!-- Main content -->

            <section class="content">
                <div class="box box-primary">
                    <!-- box-header -->
                    <div class="box-header">
                        <h3 class="box-title">Category Details</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->has('custom_error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('custom_error') }}
                            </div>
                        @endif

                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Category Title</label>
                                <input type="text" class="form-control" name="title" placeholder="category title" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea style="resize: none" class="form-control" type="text"
                                          name="description" placeholder="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" class="form-control" name="keywords" placeholder="keywords">
                            </div>

                            <div class="form-group" style="width: 100% !important">
                                <label for="parent_id">Parent Category</label>
                                <select class="form-control select-value" size="3" name="parent_id">
                                    <option value="{{null}}" selected>Select One...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">
                                            {{\App\Http\Controllers\admin\CategoryController::parentTree($category, $category->title)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" selected>Enable</option>
                                    <option value="0">Disable</option>
                                </select>
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
