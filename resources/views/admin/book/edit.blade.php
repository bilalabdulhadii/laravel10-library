@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', $data->title)

@section('head')
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Add Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endsection

@section('content')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1><span style="font-weight: bold">{{$data->title}}</span></h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="{{route('admin.book')}}">Book</a></li>
                    <li class="active">Edit {{$data->title}}</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Book Details</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{route('admin.book.update', ['id' => $data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Book title</label>
                                <input type="text" class="form-control" name="title" value="{{$data->title}}">
                            </div>

                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" name="isbn" value="{{$data->isbn}}">
                            </div>

                            <div class="form-group" style="width: 100% !important">
                                <label for="author_id">Author Name</label>
                                <select class="form-control select-value" size="3" name="author_id">
                                    <option value="{{null}}" {{$data->auhtor_id == null ? 'selected' : ''}}>Select One...</option>
                                    @foreach ($authors as $author)
                                        <option value="{{$author->id}}"
                                            {{$author->id == $data->author_id ? 'selected' : ''}}
                                        >{{$author->fname}} {{$author->lname}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label>Category</label>
                            <div class="form-group" style="border: 1px solid #d2d6de; max-height: 150px; overflow-x: hidden; overflow-y: scroll">
                                <div style="margin-left: 10px" class="checkbox">
                                    <label>
                                        <input type="checkbox" name="category_id[]" value="{{null}}" id="noneCheckbox"
                                            {{ $data->categories->isEmpty() ? 'checked' : '' }}>
                                        none
                                    </label>
                                </div>
                                @foreach ($categories->sortBy('title') as $category)
                                    <div style="margin-left: 10px" class="checkbox">
                                        <label>
                                            <input type="checkbox" name="category_id[]" value="{{$category->id}}" class="categoryCheckbox"
                                                {{ $data->categories->contains('id', $category->id) ? 'checked' : '' }}>
                                            {{\App\Http\Controllers\admin\CategoryController::parentTree($category, $category->title)}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="description">description</label>
                                <textarea style="resize: none" class="form-control" type="text"
                                          name="description" placeholder="description">{{$data->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="quantity_available">Quantity Available</label>
                                <input type="text" class="form-control" name="quantity_available" value="{{$data->quantity_available}}">
                            </div>

                            <div class="form-group">
                                <label for="language">Language</label>
                                <select class="form-control" name="language">
                                    <option selected>{{$data->language}}</option>
                                    <option value="Afrikaans">Afrikaans</option>
                                    <option value="Albanian">Albanian</option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Armenian">Armenian</option>
                                    <option value="Basque">Basque</option>
                                    <option value="Bengali">Bengali</option>
                                    <option value="Bulgarian">Bulgarian</option>
                                    <option value="Catalan">Catalan</option>
                                    <option value="Cambodian">Cambodian</option>
                                    <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                    <option value="Croatian">Croatian</option>
                                    <option value="Czech">Czech</option>
                                    <option value="Danish">Danish</option>
                                    <option value="Dutch">Dutch</option>
                                    <option value="English">English</option>
                                    <option value="Estonian">Estonian</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finnish">Finnish</option>
                                    <option value="French">French</option>
                                    <option value="Georgian">Georgian</option>
                                    <option value="German">German</option>
                                    <option value="Greek">Greek</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Hebrew">Hebrew</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Hungarian">Hungarian</option>
                                    <option value="Icelandic">Icelandic</option>
                                    <option value="Indonesian">Indonesian</option>
                                    <option value="Irish">Irish</option>
                                    <option value="Italian">Italian</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Javanese">Javanese</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Latin">Latin</option>
                                    <option value="Latvian">Latvian</option>
                                    <option value="Lithuanian">Lithuanian</option>
                                    <option value="Macedonian">Macedonian</option>
                                    <option value="Malay">Malay</option>
                                    <option value="Malayalam">Malayalam</option>
                                    <option value="Maltese">Maltese</option>
                                    <option value="Maori">Maori</option>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Mongolian">Mongolian</option>
                                    <option value="Nepali">Nepali</option>
                                    <option value="Norwegian">Norwegian</option>
                                    <option value="Persian">Persian</option>
                                    <option value="Polish">Polish</option>
                                    <option value="Portuguese">Portuguese</option>
                                    <option value="Punjabi">Punjabi</option>
                                    <option value="Quechua">Quechua</option>
                                    <option value="Romanian">Romanian</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Samoan">Samoan</option>
                                    <option value="Serbian">Serbian</option>
                                    <option value="Slovak">Slovak</option>
                                    <option value="Slovenian">Slovenian</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Swahili">Swahili</option>
                                    <option value="Swedish ">Swedish </option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Tatar">Tatar</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Thai">Thai</option>
                                    <option value="Tibetan">Tibetan</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Turkish">Turkish</option>
                                    <option value="Ukrainian">Ukrainian</option>
                                    <option value="Urdu">Urdu</option>
                                    <option value="Uzbek">Uzbek</option>
                                    <option value="Vietnamese">Vietnamese</option>
                                    <option value="Welsh">Welsh</option>
                                    <option value="Xhosa">Xhosa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="publication_year">Publication Year</label>
                                <select class="form-control" name="publication_year">
                                    @for ($year = date('Y'); $year >= 1000; $year--)
                                        <option value="{{$year}}"
                                            {{$year == $data->publication_year ? 'selected' : ''}}>
                                            {{$year}}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edition">Edition</label>
                                <input type="text" class="form-control" name="edition" value="{{$data->edition}}">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" {{$data->status == '1' ? 'selected' : ''}}>Enable</option>
                                    <option value="0" {{$data->status == '0' ? 'selected' : ''}}>Disable</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image" class="custom-file-label">Image</label>
                                <div class="input-group form-control">
                                    <div>
                                        <input type="file" class="custom-file-input" name="image">
                                    </div>
                                    <div class="checkbox">
                                        <label style="color: red">
                                            <input type="checkbox" name="del_image">Delete the existing image
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
@endsection

@section('footer')
    <!-- Add jQuery and Bootstrap JavaScript -->
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
    <!-- Add Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-value').select2();

            $('#searchForm').submit(function(e) {
                e.preventDefault();
                var searchTerm = $('#searchInput').val();
                $('.select-value').val(null).trigger('change'); // Clear previous selection
                $('.select-value').select2('open');
                $('.select2-search__field').val(searchTerm);
            });
        });


        /***** category checkbox *****/
        const noneCheckbox = document.getElementById('noneCheckbox');
        const categoryCheckboxes = document.querySelectorAll('.categoryCheckbox');

        noneCheckbox.addEventListener('change', function () {
            if (this.checked) {
                categoryCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });
            }
        });

        categoryCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    noneCheckbox.checked = false;
                }
            });
        });
    </script>
@endsection
