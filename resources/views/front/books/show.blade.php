@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', $data->title)

@section('head')
@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')
    <div class="layout_padding">
        <div class="container">
            <div style="margin-top: 50px" class="col-md-12">
                @include('errors')
            </div>
            <div class="row">
                <div class="d-flex justify-content-center align-items-start col-md-6 offset-md-3">
                    @if ($data->image)
                        <img style="height: 20vw; width: 15vw" src="{{Storage::url($data->image)}}" alt="image"/>
                    @else
                        <img style="height: 32vw; width: 25vw" src="{{asset('assets/images/300x400/Book.png')}}" alt="image"/>
                    @endif
                </div>
                <h1 style="margin-top: 50px" class="d-flex justify-content-center col-md-12">Book Details</h1>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th style="width: 200px">Title</th>
                        <td>{{$data->title}}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Author Name</th>
                        @if($data->authorId)
                            <td>{{$data->authorId->fname}} {{$data->authorId->lname}}</td>
                        @endif
                    </tr>
                    <tr>
                        <th style="width: 200px">Description</th>
                        <td>{{$data->description}}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Language</th>
                        <td>{{$data->language}}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Publication Year</th>
                        <td>{{$data->publication_year}}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">Edition</th>
                        <td>{{$data->edition}}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px">status</th>
                        <td>
                            @if ($data->status)
                                Enable
                            @else
                                Disable
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @auth
                            <form role="form" action="{{route('index.books.loan.create', ['id' => $data->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-md btn-block">Borrow Now</button>
                            </form>
                            @else
                                <a href="{{route('login')}}" class="btn btn-primary btn-md btn-block">For borrow your book, Please login</a>
                            @endauth
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection
