@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Categories - '.$settings->title)

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
                <div class="filter-side col-md-3">
                    <div>
                        <span class="count-results">{{count($results)}} Results are listed</span><hr>
                        <form class="form-box" method="get" action="{{route('index.categories')}}">
                            <span><li>Categories</li></span>
                            <div class="custom-checkbox form-group category-filter">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="category"
                                               value="{{null}}" id="category-filter">All
                                    </label>
                                    <div class="form-group" style="width: 100% !important">
                                        @foreach ($categories as $key => $category)
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="category"
                                                       value="{{$category->id}}" id="status-filter{{$key + 1}}">
                                                {{$category->title}}
                                            </label><br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div style="display: flex" class="box-footer">
                                <button style="width: 100%" type="submit" class="btn btn-primary">Apply</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if($results->count() === 0)
                    <div class="col-md-9 d-flex align-items-center justify-content-center">
                        <h3>No results Found</h3>
                    </div>
                @endif

                <div class="col-md-9 d-flex justify-content-start">
                    <div class="books-info">
                        @foreach ($results as $book)
                            <div class="book-info">
                                <a href="{{route('index.books.show', ['id' => $book->id])}}">
                                    @if ($book->image)
                                        <img style="height: 150px; width: 150px" src="{{Storage::url($book->image)}}" alt="image"/>
                                    @else
                                        <img src="{{asset('assets/images/150x150/Book.png')}}" alt="image"/>
                                    @endif
                                </a>
                                <ul class="book-info-ul">
                                    <a class="book-title" href="{{route('index.books.show', ['id' => $book->id])}}"><li>{{$book->title}}</li></a>
                                    @if($book->author_id)
                                        <a class="author-name" href="{{route('index.writers.show', ['id' => $book->author_id])}}">
                                            <li>
                                                @if ($book->authorId)
                                                    {{$book->authorId->fname}} {{$book->authorId->lname}}
                                                @endif
                                            </li>
                                        </a>
                                    @endif
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection

