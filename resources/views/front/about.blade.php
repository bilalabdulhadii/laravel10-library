@extends('layouts.front-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'About - '.$settings->title)

@section('head')

@endsection

@section('body-class', 'sub_page')

@section('header')
    @include('front.sub-header')
@endsection

@section('content')
    <section class="body_bg layout_padding" style="min-height: 800px">
        <div class="container">
            <div class="row">
                <div class="bg-w col-md-6 offset-md-3">
                    {!! $settings->about !!}
                    {{--<h3 class="about-head">Our Library</h3>
                    <p>
                        Dashboard to <span style="font-weight: 600">Creative Shelf</span>, your gateway to knowledge, exploration, and inspiration!
                        Discover a world of resources, services, and programs designed to enrich your life and foster a
                        lifelong love for learning. Whether you're seeking information, entertainment,
                        or a quiet space to study, our library is here to meet your needs.
                    </p>
                    <p>
                        Explore our vast collection of books, spanning fiction, non-fiction, classics,
                        bestsellers, and much more. From the latest releases to timeless literary treasures,
                        our shelves are brimming with possibilities. Can't find what you're looking for?
                        Our friendly staff is always ready to assist you with personalized recommendations
                        and inter library loan services.
                    </p>
                    <p>
                        Engage with our vibrant community through a multitude of programs and events.
                        Join book clubs, author talks, and thought-provoking lectures that fuel intellectual
                        discourse and connect you with fellow book lovers. Delve into our diverse range of workshops,
                        spanning topics such as technology, arts and crafts, and lifelong learning,
                        providing opportunities for personal growth and skill development.
                    </p>
                    <p>
                        Need a quiet space to study or work? We provide comfortable reading areas, study rooms,
                        and free Wi-Fi access. Explore our specialized collections, including local history archives,
                        genealogy resources, and more. Our knowledgeable librarians are here to assist you
                        with research inquiries, technology support, and information literacy skills.
                    </p>
                    <p>
                        Visit <span style="font-weight: 600">Creative Shelf</span> today and experience the joy of discovery. We are committed to serving as your
                        trusted resource, empowering you to explore, learn, and grow. Dashboard to our library,
                        where every page holds a new adventure!
                    </p>--}}
                </div>
            </div>
            {{--<div class="row">
                <div class="bg-w col-md-6 offset-md-3">
                    <h3 class="about-head">Vision</h3>
                    <p>
                        At <span style="font-weight: 600">Creative Shelf</span>, our vision is to be the cornerstone of knowledge and community enrichment,
                        fostering a culture of learning, curiosity, and inclusivity. We strive to be the
                        premier destination for intellectual growth, cultural exploration, and lifelong education.
                    </p>
                </div>
                <div class="bg-w col-md-6 offset-md-3">
                    <h3 class="about-head">Mission</h3>
                    <p>
                    Our mission is to empower individuals, inspire minds, and connect communities through access to
                    information, resources, and transformative experiences. We are committed to:
                    </p>
                    <p>
                        Providing Accessible Knowledge: We believe in equal access to information and resources for all.
                        We strive to create an inclusive environment where everyone can explore and benefit from a diverse
                        range of materials, services, and technologies.
                    </p>
                    <p>
                        Promoting Lifelong Learning: We are dedicated to promoting a love for lifelong learning.
                        Through our collections, programs, and educational initiatives, we encourage intellectual curiosity,
                        critical thinking, and personal growth for individuals of all ages.
                    </p>
                    <p>
                        Fostering Community Engagement: We aim to be a vibrant hub where community members come together
                        to share, learn, and connect. By cultivating partnerships, organizing cultural events,
                        and hosting community-driven programs, we foster a sense of belonging and pride in our diverse community.
                    </p>
                    <p>
                        Supporting Information Literacy: We recognize the importance of information literacy
                        in an ever-evolving digital age. We provide guidance and resources to help individuals navigate
                        and critically evaluate information, empowering them to become discerning users and creators of knowledge.
                    </p>
                    <p>
                        Join us on our mission to inspire, educate, and empower. Together, we can build a stronger,
                        more informed, and engaged community where knowledge flourishes and lives are enriched.
                    </p>
                </div>
            </div>--}}
        </div>
    </section>
@endsection

@section('footer')
    @include('front.footer')
@endsection
