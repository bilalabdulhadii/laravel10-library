@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', $data->fname.' '.$data->lname)

@section('head')
@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')
    <div class="layout_padding">
        <div class="container">
            <div class="row">
                <h1 class="d-flex justify-content-center col-md-12">{{$data->fname}} {{$data->lname}}</h1>
                <p class="d-flex justify-content-center col-md-12">{{$data->dates}}</p>
                <div class="d-flex justify-content-center col-md-12">
                    @if ($data->image)
                        <img style="height: 32vw; width: 70vw" src="{{Storage::url($data->image)}}" alt="image"/>
                    @else
                        <img style="height: 35vw; width: 70vw" src="{{asset('assets/images/650x450/Author.png')}}" alt="image"/>
                    @endif
                </div>

                <div style="margin-top: 30px" class="col-md-12">
                    <h1 class="d-flex justify-content-center col-md-12">Description</h1>
                    <p class="text-justify">
                        {{$data->description}}
                    </p>
                </div>
                <div class="d-flex flex-wrap justify-content-center col-md-12">
                    <h1 class="d-flex justify-content-center col-md-12">Books</h1>
                    @foreach ($books as $book)
                        <div style="height: 225px" class="book-info">
                            <a href="{{route('index.books.show', ['id' => $book->id])}}">
                                @if ($book->image)
                                    <img style="height: 150px; width: 150px" src="{{Storage::url($book->image)}}" alt="image"/>
                                @else
                                    <img src="{{asset('assets/images/150x150/Book.png')}}" alt="image"/>
                                @endif
                            </a>
                            <ul class="book-info-ul">
                                <li>{{$book->title}}</li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection
