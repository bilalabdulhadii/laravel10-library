
<div style="background-color: #e3e3e3" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        <img style="height: 70px" src="{{asset('assets/images/creative-shelf-5.png')}}" alt="">
        <h1>Creative Shelf</h1>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>


{{-- THE ORIGINAL PAGE--}}
{{--
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
--}}
