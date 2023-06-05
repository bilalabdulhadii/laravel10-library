@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'FAQ')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .accordion-button:not(.collapsed) {
            background-color: #f8f9fa;
            color: blue;
        }
    </style>
@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')
    <div class="body_bg layout_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="bg-w col-md-9">
                    <div class="d-flex justify-content-center">
                        <h2>
                            Frequently Asked Questions
                        </h2>
                    </div>
                    <hr>

                    <div class="accordion" id="accordionExample">
                        @foreach($questions as $key => $question)
                            @if($question->status == "Active")
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{$key + 1}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key + 1}}" aria-expanded="true" aria-controls="collapse{{$key + 1}}">
                                            {{$question->question}}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$key + 1}}" class="accordion-collapse collapse {{ $loop->first ? ' show' : '' }}" aria-labelledby="heading{{$key + 1}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>{{$question->subject}}</strong><br>{{$question->answer}}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
    @include('front.footer')
@endsection

