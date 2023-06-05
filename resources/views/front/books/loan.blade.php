@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Congratulations')

@section('head')
@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')
    <div class="layout_padding" style="min-height: 600px">
        <div style="text-align: center" class="container">
            <h2>Congratulations, We got your request.</h2><br>
            <h2>You Can See the last status of your book form your dashboard</h2><br>
            <a style="margin-bottom: 20px" href="{{route('dashboard')}}" class="btn btn-primary">Go To The Dashboard</a>
            <p style="color: blue">Now you go our library and get your book, <b>Our dedicated staff</b> is here to guide you
                through the book loan process, offering recommendations, assisting with selections,
                and ensuring that your borrowing experience is seamless and enjoyable.</p><br>
            <p style="color: red">After you get your book, it will be reflected on your <b>Dashboard</b> as <b>Active</b></p><br>
            <p style="text-align: justify">

                At our library, book loan is more than just a transaction; it's a connection.
                A connection between you and the author's words, between the characters and your imagination,
                and between you and the rich tapestry of human experiences captured within the pages.
                It is an opportunity to immerse yourself in the wonders of storytelling
                and witness the transformative power of literature.
                We are committed to serving as your trusted resource,
                empowering you to explore, learn, and grow. Welcome to our library.
            </p>
        </div>
    </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection
