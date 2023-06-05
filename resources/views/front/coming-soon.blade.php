<!DOCTYPE html>
<html>
<head>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="{{Storage::url($settings->icon)}}"/>
    <title>{{$settings->title}}</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bgimg {
            /*background-image: url('');*/
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
            color: black;
            font-family: "Courier New", Courier, monospace;
            font-size: 25px;
        }

        .topleft {
            position: absolute;
            top: 0;
            left: 30px;
            font-size: 42px;
        }

        .bottomleft {
            position: absolute;
            bottom: 0;
            left: 16px;
        }

        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        hr {
            margin: 0;
            width: 100%;
        }
    </style>
</head>


<body>

<div class="bgimg body_bg">
    <div class="topleft">
        <p>{{$settings->title}}</p>
    </div>
    <div class="middle">
        <hr>
        <h1>COMING SOON</h1>
        <hr>
        {{--<hr>
        <p>35 days left</p>--}}
    </div>
    <div class="bottomleft">
        {{--<p>Some text</p>--}}
    </div>
</div>

</body>
</html>
