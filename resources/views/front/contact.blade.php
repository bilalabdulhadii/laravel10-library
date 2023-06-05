@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Contact Us - '.$settings->title)

@section('head')

@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')

    <div class="body_bg layout_padding">

    <!-- contact section -->
    <section class="contact_section">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Let's Get In Touch!
                </h2>
            </div>
        </div>
        <div style="padding-top: 25px" class="container contact_bg">
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        @include('errors')
                        <form action="{{route('message')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="subject" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" style="resize: none" name="message" placeholder="Message"></textarea>
                            </div>
                            <button style="margin-bottom: 35px" class="btn btn-primary btn-block"  type="submit">
                                Send
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{asset('assets/images/contact-img.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->
    </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection

