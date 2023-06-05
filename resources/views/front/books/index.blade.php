@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Books - '.$settings->title)

@section('head')
@endsection

@section('body-class', 'sub_page')

@section('header')
@include('front.sub-header')
@endsection

@section('content')
<div class="layout_padding">
    <div class="container">
        <div class="book-search-box-row">
            <div class="book-search-box">
                <input type="text" id="search-input" placeholder="Search . . .">
                <i class="search-icon fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div class="row">
            <div class="filter-side col-md-3">
                <div>
                    <span class="count-results">{{count($results)}} Results are listed</span><hr>
                    <form class="form-box" method="get" action="{{route('index.books')}}">
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

                        <span><li>Author Name</li></span>
                        <div class="custom-checkbox form-check form-group name-filter">
                            <label style="margin-left: 15px" class="form-check-label">
                                <input class="form-check-input" type="radio" value="{{0}}"
                                       name="author_id" id="author-id-checkbox">
                                All
                            </label><br>
                            @foreach ($authors->sortBy('fname') as $key => $author)
                                <div style="display: block; margin-left: 15px">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" value="{{$author->id}}"
                                               name="author_id" id="author-id-checkbox{{$key + 1}}">
                                        {{$author->fname}} {{$author->lname}}
                                    </label><br>
                                </div>
                            @endforeach
                        </div>
                        <span><li>Status</li></span>
                        <div class="custom-checkbox form-group status-filter">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status"
                                       value="{{1}}" id="status-filter-1">
                                <label class="form-check-label" for="status-filter-1">
                                    All
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status"
                                       value="{{2}}" id="status-filter-2">
                                <label class="form-check-label" for="status-filter-2">
                                    Enable
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status"
                                       value="{{3}}" id="status-filter-3">
                                <label class="form-check-label" for="status-filter-3">
                                    Disable
                                </label>
                            </div>
                        </div>

                        <span><li>Language</li></span>
                        <div style="overflow-y: scroll; overflow-x: hidden" class="form-check form-group language-filter">
                            <label style="margin-left: 15px" class="form-check-label">
                                <input class="form-check-input" type="radio" value="{{0}}"
                                       name="language" id="language-filter">
                                All
                            </label><br>
                            @foreach ($languages->sort() as $key => $language)
                            <div style="display: block; margin-left: 15px">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="{{$language}}"
                                           name="language" id="language-filter{{$key + 1}}">
                                    {{$language}}
                                </label><br>
                            </div>
                            @endforeach
                        </div>

                        <div style="display: flex" class="box-footer">
                            <button style="width: 100%" type="submit" name="search" class="btn btn-primary">Apply</button>
                        </div>
                    </form>
                </div>
            </div>

            @if($results->count() === 0)
                <div class="col-md-9 d-flex align-items-center justify-content-center">
                    <h3>No results Found</h3>
                </div>
            @endif

            <div class="col-md-9">
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
                                    <a class="author-name" href="{{route('index.writers.show', ['id' => $book->author_id])}}"><li>
                                            @if ($book->authorId)
                                                {{$book->authorId->fname}} {{$book->authorId->lname}}
                                            @endif
                                        </li></a>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchIcon = document.querySelector('.search-icon');
        var searchInput = document.querySelector('#search-input');

        searchIcon.addEventListener('click', function() {
            submitSearchForm();
        });

        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                submitSearchForm();
            }
        });

        function submitSearchForm() {
            var searchQuery = searchInput.value;
            if (searchQuery.trim() !== '') {

            }
            var form = document.createElement('form');
            form.method = 'GET';
            form.action = '{{route('index.books')}}';

            var queryInput = document.createElement('input');
            queryInput.type = 'hidden';
            queryInput.name = 'search';
            queryInput.value = searchQuery;

            form.appendChild(queryInput);
            document.body.appendChild(form);
            form.submit();
            searchInput.value = searchQuery;
        }
    });

    $(document).ready(function() {
        $('.select-value').select2();
        $('#searchForm').submit(function(e) {
            e.preventDefault();
            var searchTerm = $('#searchInput').val();
            $('.select-value').val(null).trigger('change'); // Clear previous selection
            $('.select-value').select2('open');
            $('.select2-search__field').val(searchTerm);
        });
    });
</script>
@include('front.footer')
@endsection

{{--
@if (empty($query))
--}}{{-- Display all books --}}{{--
<div class="books-info">
    @foreach ($results as $book)
        <div class="book-info">
            <a href="">
                @if ($book->image)
                    <img style="height: 160px; width: 160px" src="{{Storage::url($data->image)}}" alt="image"/>
                @else
                    <img src="{{Storage::url('/image/book.png')}}" alt="image"/>
                @endif
            </a>
            <ul class="book-info-ul">
                <a href=""><li>{{$book->title}}</li></a>
            </ul>
        </div>
    @endforeach
</div>
@else
    --}}{{-- Display search results --}}{{--
    @if ($results->isEmpty())
        <p>No results found for your search.</p>
    @else
        @foreach ($results as $book)
            <div class="books-info">
                <div class="book-info">
                    <a></a>
                    @if ($book->image)
                        <img style="height: 160px; width: 160px" src="{{Storage::url($data->image)}}" alt="image"/>
                    @else
                        <img src="{{Storage::url('/image/book.png')}}" alt="image"/>
                    @endif
                    <ul class="book-info-ul">
                        <li>{{$book->title}}</li>
                        <li>{{$book->authorId->fname}} {{$book->authorId->lname}}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
@endif--}}
