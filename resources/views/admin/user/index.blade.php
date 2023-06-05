@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'User List')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <style>
        .dataTables_filter, .dataTables_length {
            display: inline-block;
        }
        .dataTables_filter {
            float: left !important;
            padding: 8px 0;
            margin-bottom: 10px;
        }
        .dataTables_length {
            float: right !important;
            padding: 8px 0;
            margin-bottom: 10px;
        }
        .dataTables_paginate, .dataTables_info {
            margin-top: 15px;
        }
        .dataTables_filter input[type="search"] {
            width: 285px;
        }
        .cell-image {
            text-align: center;
        }
        .cell-image img {
            max-width: 50px;
            max-height: 50px;
            object-fit: cover;
        }
        .row-align td{
            vertical-align: middle !important;
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
                <h1>User List</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">User</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <!-- box-header -->
                    <div class="box-header">
                        <a href="{{route('admin.user.create')}}">
                            <button class="btn btn-primary">New user</button>
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
                                    <th style="width: 250px">Name</th>
                                    <th>email</th>
                                    <th style="width: 200px">Role</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th style="width: 40px">Image</th>
                                    <th style="width: 250px">Name</th>
                                    <th>email</th>
                                    <th style="width: 200px">Role</th>
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
                                            @if ($rs->profile_photo_path)
                                                <img src="{{Storage::url($rs->profile_photo_path)}}" alt="image"/>
                                            @else
                                                <img src="{{asset('assets/images/100x100/User.png')}}" alt="image"/>
                                                {{--<img src="{{asset('assets/admin/images/contact-img.jpg')}}" alt="Image"/>--}}
                                            @endif
                                        </td>
                                        <td>{{$rs->name}}</td>
                                        <td>{{$rs->email}}</td>
                                        <td>{{$rs->role}}</td>
                                        <td><a href="{{route('admin.user.show', ['id' => $rs->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                        <td><a href="{{route('admin.user.edit', ['id' => $rs->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td><a href="{{route('admin.user.delete', ['id' => $rs->id])}}" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure, you want to delete the user: {{$rs->name}} .!?')">
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
                    searchPlaceholder: "user id, name, email ...", // Change the search box placeholder
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
