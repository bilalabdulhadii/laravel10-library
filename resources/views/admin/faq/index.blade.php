@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'FAQ List')

@section('head')
    <style>
        .active-faq, .draft-faq, .pending-faq {
            position: relative;
        }
        .active-faq:after {
            content: "";
            position: absolute;
            border: 6px solid green;
            border-radius: 50%;
            top: 40%;
            right: 10%;
        }
        .pending-faq:after {
            content: "";
            position: absolute;
            border: 6px solid orange;
            border-radius: 50%;
            top: 40%;
            right: 10%;
        }
        .draft-faq:after {
            content: "";
            position: absolute;
            border: 6px solid red;
            border-radius: 50%;
            top: 40%;
            right: 10%;
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
                <h1>FAQ List</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">FAQ</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <!-- box-header -->
                    <div class="box-header">
                        <a href="{{route('admin.faq.create')}}">
                            <button class="btn btn-primary">New Question</button>
                        </a>
                    </div>
                    <hr style="margin: 0">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data-table" style="margin: 0" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th style="width: 60px">Status</th>
                                    <th>Subject</th>
                                    <th>Question</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th style="width: 60px">Status</th>
                                    <th>Subject</th>
                                    <th>Question</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $rs)
                                    <tr class="row-align">
                                        <td>{{$rs->id}}</td>
                                        <td class="{{$rs->status == 'Active' ? 'active-faq' : ($rs->status == 'Draft' ? 'draft-faq' : 'pending-faq')}}">
                                            {{$rs->status}}
                                        </td>
                                        <td>{{$rs->subject}}</td>
                                        <td>{{$rs->question}}</td>
                                        <td><a href="{{route('admin.faq.show', ['id' => $rs->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                        <td><a href="{{route('admin.faq.edit', ['id' => $rs->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td><a href="{{route('admin.faq.delete', ['id' => $rs->id])}}" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure, you want to delete the faq: {{$rs->subject}} .!?')">
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
                    searchPlaceholder: "subject, question ...", // Change the search box placeholder
                    lengthMenu: "Show _MENU_ Entries", // Change the "Show entries" label
                },
                rowReorder: true,
                columnDefs: [
                    { orderable: true, targets: 0 },
                    { orderable: true, targets: 1 },
                    { orderable: true, targets: 2 },
                    { orderable: true, targets: 3 },
                    { orderable: false, targets: '_all' }
                ],
                order: [[1, 'desc']], // Sort by the second column (status) in ascending order
            });
        });
    </script>
@endsection
