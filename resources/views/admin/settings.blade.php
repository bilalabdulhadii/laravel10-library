@extends('layouts.admin-base')

@section('icon', Storage::url($settings->icon))
@section('title', 'Setting - '.$settings->title)

@section('head')
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

    <style>
        .nav-tabs-custom > .nav-tabs {
            background-color: #f6f6f6;
            border-bottom-color: grey;
        }
        .nav-tabs-custom > .nav-tabs li a {
            font-weight: 600;
        }
        .nav-tabs-custom > .nav-tabs > li.active {
            font-weight: 600;
            border-left: 1px solid #3c8dbc;
            border-right: 1px solid #3c8dbc;
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
                <h1>Settings</h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        <!-- START CUSTOM TABS -->
                        <h2 class="page-header">Admin Settings</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Custom Tabs -->
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab_1" data-toggle="tab">General</a></li>
                                            <li><a href="#tab_2" data-toggle="tab">Smtp Email</a></li>
                                            <li><a href="#tab_3" data-toggle="tab">Contact & Media</a></li>
                                            <li><a href="#tab_4" data-toggle="tab">About Us</a></li>
                                            <li><a href="#tab_5" data-toggle="tab">Reference</a></li>
                                            <li><a href="#tab_6" data-toggle="tab">Advanced</a></li>
                                        </ul>
                                        <div class="tab-content">

                                            <!-- General tab-pane -->
                                            <div class="tab-pane active" id="tab_1">
                                                <input type="hidden" id="id" name="id" value="{{$settings->id}}" class="form-control">

                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" value="{{$settings->title}}" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="company">Company</label>
                                                    <input type="text" name="company" value="{{$settings->company}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea id="description" style="resize: none" class="form-control" name="description">{{$settings->description}}</textarea>
                                                    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
                                                    <script>var editor = new FroalaEditor('#description');</script>
                                                </div>

                                                <div class="form-group">
                                                    <label for="keywords">Keywords</label>
                                                    <textarea id="keywords" style="resize: none" class="form-control" name="keywords">{{$settings->keywords}}</textarea>
                                                    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
                                                    <script>var editor = new FroalaEditor('#keywords');</script>
                                                </div>

                                                <div class="form-group">
                                                    <label for="icon" class="custom-file-label">Icon</label>
                                                    <div class="input-group form-control">
                                                        <div>
                                                            <input type="file" class="custom-file-input" name="icon">
                                                        </div>
                                                        <div class="checkbox">
                                                            <label style="color: red">
                                                                <input type="checkbox" name="del_icon">Delete the existing icon
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /. General tab-pane -->

                                            <!-- Smtp Email tab-pane -->
                                            <div class="tab-pane" id="tab_2">
                                                <div class="form-group">
                                                    <label>Smtp Server</label>
                                                    <input type="text" name="smtpserver" value="{{$settings->smtpserver}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Smtp Email</label>
                                                    <input type="text" name="smtpemail" value="{{$settings->smtpemail}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Smtp Password</label>
                                                    <input type="password" name="smtppassword" value="{{$settings->smtppassword}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Smtp Port</label>
                                                    <input type="number" name="smtpport" value="{{$settings->smtpport}}" class="form-control">
                                                </div>
                                            </div>
                                            <!-- /. Smtp Email tab-pane -->

                                            <!-- Contact tab-pane -->
                                            <div class="tab-pane" id="tab_3">
                                                {{--<div class="form-group">
                                                    <label>Contact</label>
                                                    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
                                                    <textarea id="contact" style="resize: none" class="form-control" name="contact">{{$settings->contact}}</textarea>
                                                    <script>var editor = new FroalaEditor('#contact');</script>
                                                </div>--}}

                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" name="address" value="{{$settings->address}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone" value="{{$settings->phone}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" value="{{$settings->email}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="fax">Fax</label>
                                                    <input type="text" name="fax" value="{{$settings->fax}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input type="text" name="facebook" value="{{$settings->facebook}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Youtube</label>
                                                    <input type="text" name="youtube" value="{{$settings->youtube}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Linkedin</label>
                                                    <input type="text" name="linkedin" value="{{$settings->linkedin}}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Twitter</label>
                                                    <input type="text" name="twitter" value="{{$settings->twitter}}" class="form-control">
                                                </div>
                                            </div>
                                            <!-- /. Contact tab-pane -->

                                            <!-- About tab-pane -->
                                            <div class="tab-pane" id="tab_4">
                                                <div class="form-group">
                                                    <label>About Us</label>
                                                    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
                                                    <textarea id="about" style="resize: none" class="form-control" name="about">{{$settings->about}}</textarea>
                                                    <script>var editor = new FroalaEditor('#about');</script>
                                                </div>
                                            </div>
                                            <!-- /. About tab-pane -->

                                            <!-- References tab-pane -->
                                            <div class="tab-pane" id="tab_5">
                                                <div class="form-group">
                                                    <label>References</label>
                                                    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
                                                    <textarea id="references" style="resize: none" class="form-control" name="references">{{$settings->references}}</textarea>
                                                    <script>var editor = new FroalaEditor('#references');</script>
                                                </div>
                                            </div>
                                            <!-- /. References tab-pane -->

                                            <!-- Advanced tab-pane -->
                                            <div class="tab-pane" id="tab_6">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="1" {{$settings->status == true ? 'selected' : ''}}>Enable</option>
                                                        <option value="0" {{$settings->status == false ? 'selected' : ''}}>Disable</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Factory reset</label>
                                                    <div class="checkbox">
                                                        <label style="color: red">
                                                            <input type="checkbox" id="default_settings" name="default_settings">Reset all settings to default
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /. Advanced tab-pane -->

                                        </div><!-- /.tab-content -->
                                    </div><!-- nav-tabs-custom -->

                                    <button onclick="return confirmReset();" type="submit" class="btn btn-primary">Update Settings</button>
                                </form>

                            </div><!-- /.col -->
                        </div> <!-- /.row -->
                        <!-- END CUSTOM TABS -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
@endsection

@section('footer')
    <script>
        function confirmReset() {
            var checkbox = document.getElementById("default_settings");
            if (checkbox.checked) {
                var confirmation = confirm("Are you sure, you want reset all settings to default !?");
                if (confirmation) {
                    return true; // Proceed with form submission
                } else {
                    checkbox.checked = false; // Uncheck the checkbox
                    return false; // Cancel form submission
                }
            }
        }
    </script>
@endsection
