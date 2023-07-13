@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if($message = Session::get('loan'))
    <div style="margin-bottom: 50px" class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <div style="text-align: center" class="container">
            <h2>Congratulations, We got your request.</h2><br>
            <h2>You Can See the last status of your book form your dashboard</h2><br>
            <a style="margin-bottom: 20px" href="{{route('dashboard')}}" class="btn btn-primary">Go To The Dashboard</a>
            <p style="color: blue">Now you go our library and get your book, <b>Our dedicated staff</b> is here to guide you
                through the book loan process, offering recommendations, assisting with selections,
                and ensuring that your borrowing experience is seamless and enjoyable.</p><br>
            <p style="color: red">After you get your book, it will be reflected on your <b>Dashboard</b> as <b>Active</b></p><br>
        </div>
    </div>
@endif


@if($message = Session::get('maxLoan'))
    <div style="margin-bottom: 50px" class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <div style="text-align: center" class="container">
            <h2>Sorry ..., You cannot Borrow more than <b>3</b> books in the same time.</h2><br>
            <h2>You can see your active books from your dashboard</h2><br>
            <a style="margin-bottom: 20px" href="{{route('dashboard')}}" class="btn btn-primary">Go To The Dashboard</a>
        </div>
    </div>
@endif

@if($message = Session::get('pendingLoan'))
    <div style="margin-bottom: 50px" class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <div style="text-align: center" class="container">
            <h2>Sorry ..., You already have one request.</h2><br>
            <h2>You can see your requests from your dashboard</h2><br>
            <a style="margin-bottom: 20px" href="{{route('dashboard')}}" class="btn btn-primary">Go To The Dashboard</a>
        </div>
    </div>
@endif

@if($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

{{--@if($error->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        Check the following errors :(
    </div>
@endif--}}
