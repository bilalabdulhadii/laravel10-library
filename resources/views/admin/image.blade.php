<h1>Images</h1>

@foreach ($images as $image)
    <img src="{{ asset($image) }}" alt="image">
@endforeach
