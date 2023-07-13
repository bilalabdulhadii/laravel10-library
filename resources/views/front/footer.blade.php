
<style>
    .footer-part {
        border-top: 1px solid lightgrey;
        margin: 0;
        overflow: hidden;
    }
    .footer-row {
        height: 300px;
    }
    .social-icons h1 {
        text-align: center;
    }
    .social-icons ul {
        font-size: 28px;
        text-align: center;
    }
    .social-icons a {
        text-decoration: none;
        color: black;
    }
    .social-icons ul i {
        margin: 0 10px;
    }
    .footer-logo a {
        text-decoration: none;
        color: black;
    }
    .footer-logo img {
        max-height: 100px;
        margin-right: 10px;
    }
    .footer-logo h1 {
        font-family: 'Quicksand Bold Oblique';
        font-size: 3.7vw;
    }
    .footer-links {
        font-size: 24px;
    }
    .footer-links a {
        color: black;
    }
    .footer-links i {

    }

</style>
<!-- footer section -->
<section class="footer_bg footer-part">

    <div class="footer-row row justify-content-center">
        <div class="col-md-4">
            <div class="social-icons h-100 row justify-content-center align-items-center align-content-center">
                <h1 class="col-md-9 justify-content-center">Social Media</h1>
                <ul class="col-md-9 justify-content-center">
                    <a href="{{$settings->facebook}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{$settings->youtube}}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <a href="{{$settings->linkedin}}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="{{$settings->twitter}}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                </ul>
            </div>
        </div>
        <div class="col-md-4 footer-logo">
            <a href="{{route('index')}}">
                <div class="h-100 d-flex justify-content-center align-items-center">
                    <img src="{{asset('assets/images/creative-shelf-5.png')}}" alt="Creative Shelf">
                    <h1>{{$settings->title}}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <div class="footer-links d-flex h-100 justify-content-center align-items-center">
                <ul style="list-style-type: none">
                    <li><a href="{{route('index.faq')}}"><i class="fa-regular fa-circle-question"></i> FAQ</a></li>
                    <li><a href="{{route('index.contact')}}"><i class="fa-regular fa-message"></i> Contact</a></li>
                    <li><a href="{{route('index.about')}}"><i class="fa-regular fa-user"></i> About Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid footer_section">
    <p>
        Copyright &copy; 2023 All Rights Reserved By
        <a href="https://github.com/bilalabdulhadi">Bilal & Emma</a>
    </p>
</section>
<!-- footer section -->
<script type="text/javascript" src="{{asset('assets')}}/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/bootstrap.js"></script>
