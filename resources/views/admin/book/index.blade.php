@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Book List')

@section('head')
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Book List</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Book</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <!-- box-header -->
                    <div class="box-header">
                        <a href="{{route('admin.book.create')}}">
                            <button class="btn btn-primary">New Book</button>
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
                                    <th>Author Name</th>
                                    <th style="width: 125px">ISBN</th>
                                    <th style="width: 75px">Status</th>
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
                                    <th>Author Name</th>
                                    <th style="width: 125px">ISBN</th>
                                    <th style="width: 75px">Status</th>
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
                                                <img src="{{asset('assets/images/100x100/Book.png')}}" alt="image"/>
                                            @endif
                                        </td>
                                        <td>{{$rs->title}}</td>
                                        <td>
                                            @if ($rs->authorId)
                                                    {{$rs->authorId->fname}} {{$rs->authorId->lname}}
                                            @else
                                                None
                                            @endif
                                        </td>
                                        {{--<td>{{$rs->authorId->name}}</td>--}}
                                        <td>{{$rs->isbn}}</td>
                                        <td>
                                            @if ($rs->status)
                                                Enable
                                            @else
                                                Disable
                                            @endif
                                        </td>
                                        <td><a href="{{route('admin.book.show', ['id' => $rs->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                        <td><a href="{{route('admin.book.edit', ['id' => $rs->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td><a href="{{route('admin.book.delete', ['id' => $rs->id])}}" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure, you want to delete the book: {{$rs->title}} .!?')">
                                                Delete</a>
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
                    searchPlaceholder: "book id, title, isbn ...", // Change the search box placeholder
                    lengthMenu: "Show _MENU_ Entries", // Change the "Show entries" label
                },
                rowReorder: true,
                columnDefs: [
                    { orderable: true, targets: 0 },
                    { orderable: false, targets: 1 },
                    { orderable: true, targets: 2 },
                    { orderable: true, targets: 3 },
                    { orderable: true, targets: 4 },
                    { orderable: true, targets: 5 },
                    { orderable: false, targets: '_all' }
                ]
            });
        });
    </script>
@endsection
