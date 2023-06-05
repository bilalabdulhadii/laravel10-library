@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', $settings->title)

@section('head')

@endsection

@section('header')
    @include('front.header')
@endsection

@section('content')
    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                {{-- About section --}}
                <div style="display: flex; align-items: center" class="col-md-6">
                    <div class="detail-box">
                        <div style="margin-bottom: 15px" class="heading_container">
                            <h2>
                                Explorer The World
                            </h2>
                        </div>
                        <p style="text-align: justify">
                            Embrace the magic that unfolds within the pages of a book. Open your mind and let your imagination take flight
                            as you embark on extraordinary journeys, both real and imagined. Within the quiet sanctuary of a book,
                            you hold the power to unlock new realms, discover hidden knowledge, and explore the depths of human emotions.

                            With every page turned, you invite wisdom to flow into your life. You become a traveler in time,
                            witnessing the echoes of history and the visions of the future. The words dance before your eyes,
                            forming a symphony of ideas that awaken your curiosity and broaden your understanding of the world.
                        </p>
                        <a style="margin: 10px" href="{{route('index.books')}}">
                            Book World
                        </a>
                    </div>
                </div>
                <div style="padding-left: 50px" class="col-md-6">
                    <div class="img-box">
                        <img src="{{asset('assets/images/book-world.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <div class="body_bg layout_padding">

        <!-- service section -->
        <section class="service_section ">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        At Your Service
                    </h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h4>
                                Library Card
                            </h4>
                            <p>
                                We invite you to become a part of our vibrant community by obtaining your very own library card.
                                come and claim your library card, your passport to exploration.
                                Our friendly staff is eager to assist you, guiding you through the process and helping
                                you navigate the vast sea of possibilities. and let the library become your sanctuary,
                                your refuge, and your home away from home.
                            </p>
                            <a href="{{route('index.services')}}">
                                Read More
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box align-items-end align-items-md-start text-right text-md-left">
                            <h4>
                                Book Loan
                            </h4>
                            <p>
                                Embark on a literary adventure with our book loan service, where the realms of imagination
                                and knowledge are at your fingertips. Borrow a book from our vast collection and let
                                the pages transport you to distant lands, and unravel the mysteries of the world.
                                Unlock the power of knowledge with every borrowed book.
                                Expand your horizons, delve into new subjects, and embrace the joy of learning.
                            </p>
                            <a href="{{route('index.services')}}">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h4>
                                Research & Resources
                            </h4>
                            <p>
                                Whether you are a student, a scholar, or a curious mind, our research resources are
                                designed to empower you. Dive deep into the sea of knowledge, where facts, ideas,
                                and insights intertwine. Uncover the latest discoveries, unearth historical narratives,
                                and engage with the forefront of human thought. Our resources are meticulously curated to
                                ensure you have access to authoritative, up-to-date, and relevant information.
                            </p>
                            <a href="{{route('index.services')}}">
                                Read More
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box align-items-end align-items-md-start text-right text-md-left">
                            <h4>
                                Personalized Recommendations
                            </h4>
                            <p>
                                Looking for your next great read? Look no further! At our library, we understand
                                that every reader is unique, with distinct preferences and interests. That's why we're thrilled
                                to offer personalized book recommendations tailored just for you. Whether you crave thrilling adventures,
                                thought-provoking non-fiction, heartwarming romances, or captivating mysteries,
                                we're committed to finding the perfect book that will ignite your imagination
                            </p>
                            <a href="{{route('index.services')}}">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end service section -->


        <!-- quote section -->
        <section style="background-color: white; margin-top: 60px" class="quote_section layout_padding">
            <div class="container">
                <div class="box">
                    <div class="detail-box">
                        <h3>
                            Get Your Quote Today!
                        </h3>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page
                        </p>
                    </div>
                    <div class="btn-box">
                        <a href="{{route('index.events')}}">
                            Get A Quote
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end quote section -->

        <!-- client section -->
        <section class="client_section layout_padding-top">
            <div class="d-flex justify-content-center">
                <div class="heading_container">
                    <h2>
                        Our Team
                    </h2>
                </div>
            </div>
            <div class="container layout_padding2">
                <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
                        <li data-target="#carouselExample2Indicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="client_container">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="{{asset('assets/images/librarian-0.png')}}" alt="">
                                    </div>
                                    <div class="client_name">
                                        <div>
                                            <h3>
                                                Bilal Abdulhadi
                                            </h3>
                                            <p>
                                                CEO & Technology Specialist
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_detail">
                                    <div class="client_text">
                                        <blockquote>
                                            <p>
                                                Reading is a sanctuary, a refuge from the noise of the world.
                                                It is a space where you can find solace, inspiration, and personal growth.
                                                It grants you the power to empathize with others, to see through different lenses,
                                                and to embrace the diversity of human experiences.
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="client_container">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="{{asset('assets/images/librarian-1.jpg')}}" alt="">
                                    </div>
                                    <div class="client_name">
                                        <div>
                                            <h3>
                                                Emma Meruem
                                            </h3>
                                            <p>
                                                Reference Librarian
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_detail">
                                    <div class="client_text">
                                        <blockquote>
                                            <p>
                                                Let the words be your guide, and the pages be your portal.
                                                Take delight in the simple act of reading, for it is a gateway to endless
                                                possibilities. Immerse yourself in the power of storytelling,
                                                and allow books to illuminate your path, spark your imagination,
                                                and ignite your soul.
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="client_container">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="{{asset('assets/images/librarian-2.jpg')}}" alt="">
                                    </div>
                                    <div class="client_name">
                                        <div>
                                            <h3>
                                                Alex Scarlett
                                            </h3>
                                            <p>
                                                Circulation Manager
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_detail">
                                    <div class="client_text">
                                        <blockquote>
                                            <p>
                                                In the realm of books, there are no limits or boundaries.
                                                You can walk alongside heroes, solve enigmatic puzzles,
                                                and experience a multitude of lives. As you delve deeper into the written word,
                                                you nourish your intellect, expand your vocabulary,
                                                and cultivate the art of self-expression.
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="client_container">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="{{asset('assets/images/librarian-3.jpg')}}" alt="">
                                    </div>
                                    <div class="client_name">
                                        <div>
                                            <h3>
                                                Emily Harper
                                            </h3>
                                            <p>
                                                Archivist
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="client_detail">
                                    <div class="client_text">
                                        <blockquote>
                                            <p>
                                                Many books delve into the depths of human emotions, offering a glimpse
                                                into different characters' lives and experiences. Reading can foster
                                                empathy and emotional intelligence as you connect with the characters
                                                and gain a broader understanding of the human condition.
                                            </p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end client section -->
    </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection

