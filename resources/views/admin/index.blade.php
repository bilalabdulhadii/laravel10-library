@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'AdminPanel')

@section('head')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome CSS (optional, for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .dash-box {
            height: 270px;
            overflow-x: hidden;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: transparent transparent;
        }
        .dash-box::-webkit-scrollbar {
            width: 6px; /* Set the width of the scrollbar for Webkit browsers */
        }

        .dash-box::-webkit-scrollbar-track {
            background-color: transparent; /* Set the background color of the scrollbar track */
        }

        .dash-box::-webkit-scrollbar-thumb {
            background-color: #e3e3e3; /* Set the color of the scrollbar thumb */
            border-radius: 3px; /* Set the border radius of the scrollbar thumb */
        }

        .dash-box.scrollbar-hidden::-webkit-scrollbar-thumb {
            background-color: transparent; /* Hide the scrollbar thumb */
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
                <h1>
                    Dashboard
                    <small>it all starts here</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                {{-- Statistics --}}
                <div style="margin-bottom: 50px" class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{$books->count()}}</h3>
                                <p>Books</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <a href="{{route('admin.book')}}" class="small-box-footer">All Books <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{$loans->count()}}</h3>
                                <p>Loans</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-exchange"></i>
                            </div>
                            <a href="{{route('admin.loan')}}" class="small-box-footer">All Loans <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{$users->count()}}</h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{route('admin.user')}}" class="small-box-footer">All Users <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{$categories->count()}}</h3>
                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list-ul"></i>
                            </div>
                            <a href="{{route('admin.category')}}" class="small-box-footer">All Categories <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-4">
                        <!-- Messages LIST -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Recent Messages</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box dash-box">
                                    @foreach($messages->reverse() as $message)
                                        @if($message->status == "New")
                                            <li class="item">
                                                <div class="">
                                                    <a href="{{route('admin.message.show', ['id' => $message->id])}}" class="product-title">{{$message->subject}}</a><b> From </b>
                                                    <a href="{{route('admin.message.show', ['id' => $message->id])}}" class="product-title">{{$message->name}}</a>
                                                    <span class="label pull-right label-success">{{$message->status}}</span>
                                                    <span class="product-description">{{$message->message}}</span>
                                                </div>
                                            </li><!-- /.item -->
                                        @endif
                                    @endforeach
                                    @foreach($messages->reverse() as $message)
                                        @if($message->status == "Read")
                                            <li class="item">
                                                <div class="">
                                                    <a href="{{route('admin.message.show', ['id' => $message->id])}}" class="product-title">{{$message->subject}}</a><b> From </b>
                                                    <a href="{{route('admin.message.show', ['id' => $message->id])}}" class="product-title">{{$message->name}}</a>
                                                    <span class="label pull-right  label-waring">{{$message->status}}</span>
                                                    <span class="product-description">{{$message->message}}</span>
                                                </div>
                                            </li><!-- /.item -->
                                        @endif
                                    @endforeach
                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{route('admin.message')}}" class="uppercase">View All Messages</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->

                    <div class="col-md-4">
                        <!-- Notes LIST -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Message Notes</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box dash-box">
                                    @foreach($messages->reverse() as $message)
                                        @if($message->note !== null)
                                            @if($message->status == "Read")
                                                <li class="item">
                                                    <div class="">
                                                        <a href="{{route('admin.message.show', ['id' => $message->id])}}" class="product-title">{{$message->subject}}</a><b> From </b>
                                                        <a href="{{route('admin.message.show', ['id' => $message->id])}}" class="product-title">{{$message->name}}</a>
                                                        <span class="label pull-right label-waring">{{$message->status}}</span>
                                                        <span class="product-description">{{$message->note}}</span>
                                                    </div>
                                                </li><!-- /.item -->
                                            @endif
                                        @endif
                                    @endforeach
                                    @foreach($messages->reverse() as $message)
                                        @if($message->note !== null)
                                            @if($message->status == "Replied")
                                                <li class="item">
                                                    <div class="">
                                                        <a href="{{route('admin.message.show', ['id' => $message->id])}}" class="product-title">{{$message->subject}}</a><b> From </b>
                                                        <a href="{{route('admin.message.show', ['id' => $message->id])}}" class="product-title">{{$message->name}}</a>
                                                        <span class="label pull-right label-default">{{$message->status}}</span>
                                                        <span class="product-description">{{$message->note}}</span>
                                                    </div>
                                                </li><!-- /.item -->
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{route('admin.message')}}" class="uppercase">View All Messages</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->

                    <div class='col-md-4'>
                        <!-- PENDING LOANS -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Pending Loans</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box dash-box">
                                    @foreach($loans->reverse() as $loan)
                                        @if($loan->status == "Pending")
                                            <li class="item">
                                                <div class="">
                                                    <a href="{{route('admin.loan.edit', ['id' => $loan->id])}}" class="product-title">{{$loan->userId->name}}</a>
                                                    <span class="label pull-right label-waring">{{$loan->status}}</span>
                                                    <span class="product-description">{{$loan->bookId->title}}<b> - </b>{{$loan->bookId->isbn}}</span>
                                                </div>
                                            </li><!-- /.item -->
                                        @endif
                                    @endforeach
                                    @foreach($loans->reverse() as $loan)
                                        @if($loan->status == "Active")
                                            <li class="item">
                                                <div class="">
                                                    <a href="{{route('admin.loan.edit', ['id' => $loan->id])}}" class="product-title">{{$loan->userId->name}}</a>
                                                    <span class="label pull-right label-success">{{$loan->status}}</span>
                                                    <span class="product-description">{{$loan->bookId->title}}<b> - </b>{{$loan->bookId->isbn}}</span>
                                                </div>
                                            </li><!-- /.item -->
                                        @endif
                                    @endforeach
                                </ul>
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{route('admin.loan')}}" class="uppercase">View All Loans</a>
                            </div><!-- /.box-footer -->
                        </div><!-- /.box -->


                        {{--<!-- USERS LIST -->
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Members</h3>
                                <div class="box-tools pull-right">
                                    <span class="label label-danger">8 New Members</span>
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix dash-box">
                                    @foreach($users->reverse() as $user)
                                            <li>
                                                @if ($user->profile_photo_path)
                                                    <img src="{{Storage::url($user->profile_photo_path)}}" alt="User Image"/>
                                                @else
                                                    <img src="{{asset('assets/images/150x150/User.png')}}" alt="image"/>
                                                @endif
                                                <a class="users-list-name" href="{{route('admin.user.show', ['id' => $user->id])}}">{{$user->name}}</a>
                                                <span class="users-list-date">{{$user->created_at->format('Y-F-j')}}</span>
                                            </li>
                                    @endforeach
                                </ul><!-- /.users-list -->
                            </div><!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{route('admin.user')}}" class="uppercase">View All Users</a>
                            </div><!-- /.box-footer -->
                        </div>
                        <!--/.box -->--}}
                    </div><!-- /.col -->
                </div>

                <!-- Default box -->
                {{--<div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Title</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        Start creating your amazing application!
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        Footer
                    </div>
                    <!-- /.box-footer-->
                </div>--}}
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            var scrollContainer = $('.');

            scrollContainer.on('scroll', function() {
                if (this.scrollHeight > this.clientHeight) {
                    scrollContainer.addClass('scrollbar-hidden');
                } else {
                    scrollContainer.removeClass('scrollbar-hidden');
                }
            });
        });
    </script>
@endsection
