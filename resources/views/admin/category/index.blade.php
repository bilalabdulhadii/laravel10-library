@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Category List')

@section('head')
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Category List</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Category</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <!-- box-header -->
                    <div class="box-header">
                        <a href="{{route('admin.category.create')}}">
                            <button class="btn btn-primary">New Category</button>
                        </a>
                    </div>
                    <hr style="margin: 0">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data-table" style="margin: 0" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th style="width: 40px">Image</th>
                                    <th>Title</th>
                                    <th>Parent Category</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th style="width: 40px">Image</th>
                                    <th>Title</th>
                                    <th>Parent Category</th>
                                    <th style="width: 100px">Status</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $rs)
                                    <tr class="row-align">
                                        <td>{{$rs->id}}</td>
                                        <td class="cell-image">
                                            @if ($rs->image)
                                                <img src="{{Storage::url($rs->image)}}" alt="image"/>
                                            @else
                                                <img src="{{asset('assets/images/100x100/Category.png')}}" alt="image"/>
                                                {{--<img src="{{asset('assets/admin/images/contact-img.jpg')}}" alt="Image"/>--}}
                                            @endif
                                        </td>
                                        <td>{{$rs->title}}</td>
                                        <td>
                                            @if ($rs->categoryId)
                                                {{\App\Http\Controllers\admin\CategoryController::parentTree($rs, $rs->title)}}
                                            @else
                                                Main Category
                                            @endif
                                        </td>
                                        <td>
                                            @if ($rs->status)
                                                Enable
                                            @else
                                                Disable
                                            @endif
                                        </td>
                                        <td><a href="{{route('admin.category.show', ['id' => $rs->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                        <td><a href="{{route('admin.category.edit', ['id' => $rs->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td><a href="{{route('admin.category.delete', ['id' => $rs->id])}}" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure, you want to delete the category: {{$rs->title}} .!?')">
                                                Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
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
                    searchPlaceholder: "category id, title ...", // Change the search box placeholder
                    lengthMenu: "Show _MENU_ Entries", // Change the "Show entries" label
                },
                rowReorder: true,
                columnDefs: [
                    { orderable: true, targets: 0 },
                    { orderable: false, targets: 1 },
                    { orderable: true, targets: 2 },
                    { orderable: true, targets: 3 },
                    { orderable: true, targets: 4 },
                    { orderable: false, targets: '_all' }
                ]
            });
        });
    </script>
@endsection
