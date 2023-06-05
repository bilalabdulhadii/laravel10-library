@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Loan Details')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <style>
        .dataTables_filter {
            float: left !important;
            padding: 8px 0;
            margin-bottom: 10px;
        }
        .dataTables_filter input[type="search"] {
            width: 285px;
        }

        .value-view {
            margin-top: 20px;
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
                <h1>Loan Details</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.loan')}}">Loan</a></li>
                    <li class="active">Loan Details</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        @if($data->status == "Pending")
                            <a style="margin-right: 10px" href="{{route('admin.loan.active', ['id' => $data->id])}}">
                                <button class="btn btn-success">Mark As Active</button>
                            </a>
                        @endif

                        <a href="{{route('admin.loan.return', ['id' => $data->id])}}" class="btn btn-danger btn-primary"
                           onclick="return confirm('Are you sure, you want to mark {{$data->bookId->title}} as returned .!?')">
                            Mark As Returned</a>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.loan.update', ['id' => $data->id])}}" method="post">
                        @csrf

                        @if ($errors->has('custom_error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('custom_error') }}
                            </div>
                        @endif

                        <div class="box-body">

                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" style="cursor: default" class="form-control" value="{{$data->status}}" readonly>
                            </div>

                            <!-- input table of user id -->
                            <div class="table-container">
                                {{--@if ($errors->has('custom_error1'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('custom_error1') }}
                                    </div>
                                @endif--}}

                                <table id="user-data-table" style="margin: 0" class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">Select</th>
                                        <th style="width: 15%">Id</th>
                                        <th style="width: 25%">User Name</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr class="user-row">
                                            <td style="text-align: center">
                                                <label>
                                                    <input class="form-check-input user-radio" type="radio" value="{{$user->id}}"
                                                           name="user_id" id="user-id-radio{{$key + 1}}" required
                                                        {{$user->id == $data->user_id ? 'checked' : ''}}>
                                                </label>
                                            </td>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group value-view">
                                    <label>User Name</label>
                                    <input type="text" style="cursor: default" class="form-control" id="user-selected-value" readonly>
                                </div>
                            </div>

                            <!-- input table of book id -->
                            <div class="table-container" style="margin-top: 30px">
                                <table id="book-data-table" style="margin: 0" class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">Select</th>
                                        <th style="width: 15%">ISBN</th>
                                        <th style="width: 20%">Book Title</th>
                                        <th style="width: 15%">Quantity Available</th>
                                        <th style="width: 15%">Language</th>
                                        <th style="">Edition</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($books as $key => $book)
                                        <tr class="book-row">
                                            <td style="text-align: center;">
                                                <label>
                                                    <input class="form-check-input book-radio" type="radio" value="{{$book->id}}"
                                                           name="book_id" id="book-id-radio{{$key + 1}}" required
                                                        {{$book->id == $data->book_id ? 'checked' : ''}}>
                                                </label>
                                            </td>
                                            <td>{{$book->isbn}}</td>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->quantity_available}}</td>
                                            <td>{{$book->language}}</td>
                                            <td>{{$book->edition}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="form-group value-view">
                                    <label>Book Title</label>
                                    <input type="text" style="cursor: default" class="form-control" id="book-selected-value" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button style="margin-right: 10px" type="submit" class="btn btn-primary">Update</button>
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
    {{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        /*var inputValue = document.querySelector('.user-radio').value;*/
        $(document).ready(function() {
            $('#user-data-table').DataTable({
                scrollY: '20vh',
                scrollCollapse: true,
                dom: 'ft',
                language: {
                    search: "User Search: ", // Change the search box label
                    searchPlaceholder: "user name, user id ...", // Change the search box placeholder
                },
            });

            $('#book-data-table').DataTable({
                scrollY: '20vh',
                scrollCollapse: true,
                dom: 'ft',
                language: {
                    search: "Book Search: ", // Change the search box label
                    searchPlaceholder: "isbn, book title ...", // Change the search box placeholder
                },
            });


            // Set the new selected values in the selected-value box
            $('.user-row').click(function() {
                $(this).find('.user-radio').prop('checked', true);
                var userInput = $(this).find('td:nth-child(3)').text();
                $('#user-selected-value').val(userInput);
            });

            $('.book-row').click(function() {
                $(this).find('.book-radio').prop('checked', true);
                var bookInput = $(this).find('td:nth-child(3)').text();
                $('#book-selected-value').val(bookInput);
            });

            // Set the initial selected values in the selected-value box
            var selectedUser = $('.user-row').find('.user-radio:checked');
            if (selectedUser.length > 0) {
                var selectedUserInput = selectedUser.closest('tr').find('td:nth-child(3)').text();
                $('#user-selected-value').val(selectedUserInput);
            }

            var selectedBook = $('.book-row').find('.book-radio:checked');
            if (selectedBook.length > 0) {
                var selectedBookInput = selectedBook.closest('tr').find('td:nth-child(3)').text();
                $('#book-selected-value').val(selectedBookInput);
            }
        });
    </script>
@endsection
