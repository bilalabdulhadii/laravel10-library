<!DOCTYPE html>
<html>
<body>

<form action="/test-save" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" id="fileToUpload"><br>
    <input type="submit" value="Submit" name="submit">
</form>

{{--<img src="{{Storage::url($data->image)}}" alt="image">--}}


</body>
</html>
