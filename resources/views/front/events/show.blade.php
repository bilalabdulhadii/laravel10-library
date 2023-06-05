@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', $data->fname.' '.$data->lname)

@section('head')
    <style>
        .event-text h1{
            text-align: center;
        }
        .event-text-p {
            margin-top: 20px;
            color: red;
            font-size: 24px;
            letter-spacing: 2px;
            text-align: justify;
        }
        .event-container {
            padding: 20px;
            box-shadow: 5px 5px 5px 0 gray;
            border-radius: 10px;
        }
    </style>
@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')
    <div style="min-height: 600px" class="layout_padding body_bg">
        <div class="container event-container bg-white">
            <div class="row d-flex justify-content-center">

                <div class="col-md-9 event-text">
                    <h1>{{$data->title}}</h1>
                    <p>
                        {!! '<div class="event-text-p">'.$data->content.'</div>' !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection
