@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Events - '.$settings->title)
@php
    use Illuminate\Support\HtmlString;
    use Illuminate\Support\Str;
@endphp
@section('head')
    <style>
        .event-date, .event-content {
            height: 120px;
            margin-bottom: 50px;
            overflow: hidden;
            display: flex;
            background-color: white;
            box-shadow: 5px 5px 10px 0px gray;
        }
        .event-date {
            max-width: fit-content;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: brown;
            color: white;
        }
        .event-content {
            text-align: justify;
            align-items: center;
        }
        .event-content p {
        }
    </style>
@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')
    <div class="layout_padding body_bg" style="min-height: 600px">
        <div class="container">
            <div class="row justify-content-center">
                @php
                    function truncateHtml($string, $limit, $route, $id) {
                    $truncated = Str::limit(strip_tags($string), $limit);
                    if (strlen(strip_tags($string)) > $limit) {
                        $truncated .= ' <a href="' . route($route, $id) . '">Read More</a>';
                    }
                    return new HtmlString($truncated);
                    }
                @endphp
                @foreach($data as $event)
                    @if($event->status)
                        <div class="col-md-3 d-flex flex-column event-date">
                            <span class="" style="font-size: 40px">{{$event->created_at->format('j')}}</span>
                            <p>{{$event->created_at->format('F')}}  {{$event->created_at->format('Y')}} - {{ $event->created_at->format('H:i') }}</p>
                        </div>
                        <div class="col-md-6 event-content">
                            <p><b>{{$event->title}}</b>  {!! truncateHtml($event->content, 200, 'index.events.show', $event->id) !!}</p>
                        </div>
                        <div style="width: 100%"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection
