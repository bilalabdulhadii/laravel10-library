@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Writers - '.$settings->title)

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
                <div class="col-md-12">
                    <div>
                        <ul class="order-ul">
                                <li>
                                    <a href="{{route('index.writers', ['char' => null])}}" style="padding: 4px 6px"
                                       class="char-link {{$selected_char == null ? 'active' : ''}}">
                                        All
                                    </a>
                                </li>
                            @foreach (range('A', 'Z') as $char)
                                <li>
                                    <a href="{{route('index.writers', ['char' => $char])}}"
                                       class="char-link {{$selected_char == $char ? 'active' : ''}}
                                       {{--{{ $char_counts[$char] == 0 ? 'disabled' : '' }}--}}">
                                        {{$char}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="authors">
                        @foreach($authors as $author)
                            <div class="author">
                                <a href="{{route('index.writers.show', ['id' => $author->id])}}">
                                    @if ($author->image)
                                        <img style="height: 150px; width: 150px" src="{{Storage::url($author->image)}}" alt="image"/>
                                    @else
                                        <img src="{{asset('assets/images/150x150/Author.png')}}" alt="image"/>
                                    @endif
                                </a>
                                    <ul class="author-info">
                                        <li>{{$author->fname}} {{$author->lname}}</li>
                                        <li>{{$author->dates}}</li>
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

