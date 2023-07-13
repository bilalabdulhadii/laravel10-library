@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'New Author')

@section('head')
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>New Author</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.author')}}">Author</a></li>
                    <li class="active">New Author</li>
                </ol>
            </section>
            <!-- Main content -->

            <section class="content">
                <div class="box box-primary">
                    <!-- box-header -->
                    <div class="box-header">
                        <h3 class="box-title">Author Information</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    @include('errors')
                    <form role="form" action="{{route('admin.author.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- box-body -->
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" name="fname" placeholder="author first name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" name="lname" placeholder="author last name">
                                    </div>
                                </div>

                            </div>

                            {{--<div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="birth_date">Birth year</label>
                                        <select class="form-control" name="birth_date">
                                            <option value="{{null}}">Select birth date</option>
                                            @for ($year = date('Y'); $year >= 1000; $year--)
                                                <option value="{{$year}}">{{$year}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="death_date">Death year</label>
                                        <select class="form-control" name="death_date">
                                            <option value="{{null}}">Select death date</option>
                                            @for ($year = date('Y'); $year >= 1000; $year--)
                                                <option value="{{$year}}">{{$year}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="form-group">
                                <label for="birth_date">Birth Date</label>
                                <input name="birth_date" type="number" class="form-control" placeholder="birth date">
                            </div>

                            <div class="form-group">
                                <label for="death_date">Death Date</label>
                                <input name="death_date" type="number" class="form-control" placeholder="death date">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea style="resize: none" class="form-control" type="text"
                                          name="description" placeholder="description"></textarea>
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
                            {{--<input type="hidden" value="This author has made significant contributions to the literary world. Their works encompass a wide array of genres and themes, captivating readers with compelling narratives and thought-provoking storytelling. With a distinct writing style, this author has left an indelible mark on literature, earning acclaim and a dedicated readership." id="default_desc">
                            <a style="cursor: pointer" onclick="myFunction()" class="btn btn-success">Default Description</a>
                        --}}
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
    <script>
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("default_desc");

            // Select the text field
            copyText.select();
            //copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
        }
    </script>
@endsection
