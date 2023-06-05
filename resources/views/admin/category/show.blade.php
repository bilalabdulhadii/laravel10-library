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
                    <li><a href="{{route('admin.category')}}">Category</a></li>
                    <li class="active">{{$data->title}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
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
                                <th style="width: 150px">Description</th>
                                <td>{{$data->description}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Keywords</th>
                                <td>{{$data->keywords}}</td>
                            </tr>
                            <tr>
                                <th style="width: 150px">Parent Category</th>
                                <td>
                                    @if ($data->categoryId)
                                        {{\App\Http\Controllers\admin\CategoryController::parentTree($data, $data->title)}}
                                    @else
                                        None
                                    @endif
                                </td>
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
                                        <img src="{{asset('assets/images/100x100/Category.png')}}" alt="image"/>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{{route('admin.category.edit', ['id' => $data->id])}}" class=" btn btn-info btn-sm">Edit</a>
                        <a href="{{route('admin.category.delete', ['id' => $data->id])}}" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure, you want to delete the category: {{$data->title}} .!?')">
                            Delete</a>
                    </div>
                </div>

                <div class="box">
                    <!-- box-header -->
                    <div class="box-header">
                        <h3 class="box-title">Books</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body padding">
                        <table id="data-table" style="margin: 0" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>ISBN</th>
                                <th>Book Title</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>ISBN</th>
                                <th>Book Title</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @if($data->books->count() > 0)
                                @foreach($data->books as $book)
                                    <tr>
                                        <td>
                                            {{ $book->id }}
                                        </td>
                                        <td>
                                            {{ $book->isbn }}
                                        </td>
                                        <td>
                                            {{ $book->title }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                None
                            @endif
                            </tbody>
                        </table>
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
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                pagingType: 'simple_numbers',
                dom: 'fltip',
                language: {
                    search: "Search: ", // Change the search box label
                    searchPlaceholder: "book id, title, isbn ...", // Change the search box placeholder
                    lengthMenu: "Show _MENU_ Entries", // Change the "Show entries" label
                },
                rowReorder: true,
            });
        });
    </script>
@endsection
