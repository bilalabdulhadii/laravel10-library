@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Loan List')
@php
    use Illuminate\Support\HtmlString;
    use Illuminate\Support\Str;
    use Carbon\Carbon;

@endphp
@section('head')
    <style>
        .active-loan, .overdue-loan, .returned-loan, .pending-status {
            position: relative;
        }
        .active-loan:after {
            content: "";
            position: absolute;
            border: 6px solid green;
            border-radius: 50%;
            top: 30%;
            right: 10%;
        }
        .overdue-loan:after {
            content: "";
            position: absolute;
            border: 6px solid red;
            border-radius: 50%;
            top: 30%;
            right: 10%;
        }
        .returned-loan:after {
            content: "";
            position: absolute;
            border: 6px solid gray;
            border-radius: 50%;
            top: 30%;
            right: 10%;
        }
        .pending-status:after {
            content: "";
            position: absolute;
            border: 6px solid orange;
            border-radius: 50%;
            top: 30%;
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
                <h1>Loan List</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Loan</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <!-- box-header -->
                    <div class="box-header">
                        <a href="{{route('admin.loan.create')}}">
                            <button class="btn btn-primary">New Loan</button>
                        </a>
                    </div>
                    <hr style="margin: 0">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data-table" style="margin: 0" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th style="width: 70px">Status</th>
                                    <th style="width: 250px">User Name</th>
                                    <th>Book Title</th>
                                    <th style="width: 200px">Due Date</th>
                                    <th style="width: 200px">Returned At</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 40px">Id</th>
                                    <th style="width: 70px">Status</th>
                                    <th style="width: 250px">User Name</th>
                                    <th>Book Title</th>
                                    <th style="width: 200px">Due Date</th>
                                    <th style="width: 200px">Returned At</th>
                                    <th style="width: 40px">Show</th>
                                    <th style="width: 40px">Edit</th>
                                    <th style="width: 40px">Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td class="{{$rs->status == 'Active' ? 'active-loan' : ($rs->status == 'Overdue' ? 'overdue-loan' : ($rs->status == 'Returned' ? 'returned-loan' : 'pending-status'))}}">
                                            {{$rs->status}}
                                        </td>
                                        {{--<td class="{{$rs->status == 'Active' ? 'active-loan' : ($rs->status == 'Overdue' ? 'overdue-loan' : 'returned-loan')}}">
                                            {{$rs->status}}
                                        </td>--}}
                                        <td>{{$rs->userId->name}}</td>
                                        <td>{{$rs->bookId->title}}</td>
                                        <td>{{ Carbon::parse($rs->due_date)->format('Y-m-d') }}</td>
                                        <td>{{$rs->return_date}}</td>
                                        <td><a href="{{route('admin.loan.show', ['id' => $rs->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                        <td><a href="{{route('admin.loan.edit', ['id' => $rs->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                        <td><a href="{{route('admin.loan.delete', ['id' => $rs->id])}}" class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure, you want to delete the loan: {{$rs->id}} .!?')">
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
                    { orderable: true, targets: 1 },
                    { orderable: true, targets: 2 },
                    { orderable: true, targets: 3 },
                    { orderable: true, targets: 4 },
                    { orderable: true, targets: 5 },
                    { orderable: false, targets: '_all' }
                ],
                order: [[1, 'asc']], // Sort by the second column (status) in ascending order
            });
        });
    </script>
@endsection
