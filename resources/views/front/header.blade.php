
    <div class="hero_area">
        @php
            $parentCategories = \App\Http\Controllers\Front\CategoriesController::categoryList();
        @endphp
        <!-- header section strats -->
        <header class="header_section">
            <div style="padding: 0" class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
                    {{-- site logo--}}
                    <div>
                        <a class="navbar-brand mr-5" href="{{route('index')}}">
                            <img src="{{asset('assets/images/creative-shelf-4.png')}}" alt="">
                            <span>{{$settings->title}}</span>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="d-flex mx-auto flex-column flex-md-row align-items-center">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('index.books')}}">Books<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index.writers')}}">Writers</a>
                                </li>
                                <!-- Categories Menu -->
                                <li class="nav-item">
                                    <a style="cursor: pointer" class="nav-link dropdown-toggle" {{--href="{{route('index.categories')}}"--}}
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                                    <ul class="dropdown-menu dropdown-menu-wide" aria-labelledby="navbarDropdownMenuLink">
                                        @foreach($parentCategories as $parent)
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item {{count($parent->children) ? 'dropdown-toggle' : ''}}"
                                                   href="{{route('index.categories', ['category' => $parent->id])}}">{{ $parent->title }}</a>
                                                @if(count($parent->children))
                                                    @include('front.categories.category-tree', ['subCategory' => $parent->children])
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <!-- End Categories Menu -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index.events')}}">Events</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index.services')}}">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('index.about')}}">About</a>
                                </li>
                                {{--<li class="nav-item">
                                    <a class="nav-link" href="{{route('index.contact')}}">Contact</a>
                                </li>--}}
                                <li class="Login nav-item">
                                    @auth
                                        <a class="nav-link dropdown-toggle" href="{{route('dashboard')}}" id="navbarDropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                                        <ul class="dropdown-menu dropdown-menu-wide" aria-labelledby="navbarDropdownMenuLink">
                                            @if(Auth::user()->isAdmin() || Auth::user()->isLibrarian())
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item" href="{{route('admin')}}">AdminPanel</a>
                                                </li>
                                            @endif
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item" href="{{route('profile.show')}}">Profile</a>
                                            </li>
                                            <hr style="margin: 0">
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item">
                                                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                                        @csrf
                                                        <button type="submit" style="background: none; border: none; ">Logout</button>
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                    @endauth
                                    @guest
                                        <a class="nav-link" href="{{route('login')}}">Login</a>
                                    @endguest
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <!-- slider section -->
        <section class="slider_section position-relative">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <div>
                                            <h1>
                                                For Book Lovers<br>
                                                <span>Awesome Online Communities</span>
                                            </h1>
                                            <p>
                                                Sign up to see what your friends are reading, share your reading life and discover new books,
                                                and join the world’s largest community of readers.
                                            </p>
                                            <div class="btn-box">
                                                <a href="{{route('register')}}" class="btn-1">
                                                    Let's Start
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <div>
                                            <h1>
                                                What should I Read <br>
                                                <span>Meet Your Next Favorite Book</span>
                                            </h1>
                                            <p>
                                                Check out our suggestions on the best book, get  recommendations
                                                and what books are worth the read! View now!
                                            </p>
                                            <div class="btn-box">
                                                <a href="{{route('register')}}" class="btn-1">
                                                    Join Us
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom_carousel-control">
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>
