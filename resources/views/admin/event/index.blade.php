@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Event List')

@section('head')
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Event List</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Event</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <!-- box-header -->
                    <div class="box-header">
                        <a href="{{route('admin.event.create')}}">
                            <button class="btn btn-primary">New Event</button>
                        </a>
                    </div>
                    <hr style="margin: 0">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data-table" style="margin: 0" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th>Title</th>
                                    <th style="width: 200px">Status</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th>Title</th>
                                    <th style="width: 200px">Status</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $rs)
                                    <tr class="row-align">
                                        <td>{{$rs->id}}</td>
                                        <td>{{$rs->title}}</td>
                                        <td>
                                            @if ($rs->status)
                                                Enable
                                            @else
                                                Disable
                                            @endif
                                        </td>
                                        <td><a href="{{route('admin.event.show', ['id' => $rs->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                        <td><a href="{{route('admin.event.edit', ['id' => $rs->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td><a href="{{route('admin.event.delete', ['id' => $rs->id])}}" class="btn btn-danger btn-sm"
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
                    searchPlaceholder: "event id, title ...", // Change the search box placeholder
                    lengthMenu: "Show _MENU_ Entries", // Change the "Show entries" label
                },
                rowReorder: true,
                columnDefs: [
                    { orderable: true, targets: 0 },
                    { orderable: true, targets: 1 },
                    { orderable: true, targets: 2 },
                    { orderable: false, targets: '_all' }
                ]
            });
        });
    </script>
@endsection
