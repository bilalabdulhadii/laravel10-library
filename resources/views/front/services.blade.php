@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Services - '.$settings->title)

@section('head')
    <style>
        .service-content h2{
            text-align: center;
            text-decoration: underline black;
        }
        .service-content p{
            margin-top: 20px;
            text-align: justify;
            font-size: 18px;
        }
        .service-row {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 100px;
            box-shadow: 5px 5px 5px 0px gray;
        }
    </style>
@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')
    <section class="body_bg layout_padding">
        <div class="container">
            <div class="row service-row bg-white d-flex justify-content-center">
                <div class="service-content col-md-6">
                    <h2>Book Borrowing</h2>
                    <p>
                        Discover a world of knowledge at your fingertips. Our library offers a vast collection of
                        books across various genres, including fiction, non-fiction, biographies, self-help,
                        and more. Whether you're an avid reader or just starting your reading journey,
                        we have something for everyone. From bestsellers to classic literature, our shelves are filled
                        with captivating stories and informative resources. You can borrow up to <span style="font-weight: 600">[3]</span>
                        books at a time and keep them for <span style="font-weight: 600">[2]</span> weeks. Renewals are available if no one else has reserved
                        the book you're currently reading. Join us and embark on incredible literary adventures!
                    </p>
                </div>
                <div class="col-md-6">
                    <img style="max-width: 100%" src="{{asset('assets/images/borrow-book.png')}}" alt="">
                </div>
            </div>

            <div class="row service-row bg-white d-flex justify-content-center">
                <div class="col-md-6">
                    <img style="max-width: 100%" src="{{asset('assets/images/library-card.png')}}" alt="">
                </div>
                <div class="service-content col-md-6">
                    <h2>Library Card</h2>
                    <p>
                        Unlock a world of possibilities with your very own library card. Our library card grants you
                        access to a wide range of resources and services. With a library card, you can borrow books,
                        e-books, audiobooks, and other materials from our collection. It serves as your passport to
                        knowledge and entertainment. Additionally, your library card allows you to reserve and request
                        books, renew borrowed items, and manage your account online. It's quick and easy to get a library
                        card – simply visit our library's circulation desk, provide some basic information,
                        and start enjoying all the benefits and privileges that come with being a library member.
                        Don't miss out on the opportunity to explore, learn, and discover with your library card in hand!
                    </p>
                </div>
            </div>

            <div class="row service-row bg-white d-flex justify-content-center">
                <div class="service-content col-md-6">
                    <h2>Reading Recommendations</h2>
                    <p>
                        Not sure what to read next? Let our expert librarians guide you with personalized reading recommendations.
                        We understand that finding the perfect book can be a challenge, especially with countless options available.
                        Our librarians are passionate about literature and are here to assist you.
                        Simply provide us with your reading preferences, such as your favorite genres,
                        authors, or themes, and we'll curate a customized list of recommendations just for you.
                        Whether you're seeking a gripping mystery, a heartwarming romance,
                        or a thought-provoking non-fiction book, we'll help you discover hidden gems and popular
                        titles alike. Get ready to be inspired and captivated by our curated reading suggestions.
                    </p>
                </div>
                <div class="col-md-6">
                    <img style="max-width: 100%" src="{{asset('assets/images/reading-list.png')}}" alt="">
                </div>
            </div>

            <div class="row service-row bg-white d-flex justify-content-center">
                <div class="col-md-6">
                    <img style="max-width: 100%" src="{{asset('assets/images/research.png')}}" alt="">
                </div>
                <div class="service-content col-md-6">
                    <h2>Research & Resources</h2>
                    <p>
                        Expand your horizons beyond the bookshelves. Access our extensive range of online resources
                        from the comfort of your home or on the go. We offer a wide selection of e-books and
                        audiobooks that you can borrow and enjoy on your preferred device. Dive into captivating novels,
                        explore educational content, or simply relax with a great story. In addition to e-books and
                        audiobooks, we provide access to academic journals and research databases. These resources
                        are invaluable for students, researchers, and anyone seeking in-depth knowledge on various subjects. With our online resources, the world of information is just a click away.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('front.footer')
@endsection

