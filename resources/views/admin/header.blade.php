
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <a href="{{route('index')}}" target="_blank" class="logo"><i class="fa fa-home"></i> Preview Site</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a style="cursor: pointer" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages -->
                    <li>
                        <a href="{{route('admin.message')}}" title="Messages">
                            <i class="fa fa-envelope-o"></i>
                            <span style="font-size: 14px" class="label label-success"></span>
                        </a>
                    </li>

                    <!-- Notifications -->
                    <li>
                        <a href="{{route('admin.loan')}}" title="Requests">
                            <i class="fa fa fa-bell-o"></i>
                            <span style="font-size: 14px" class="label label-success"></span>
                        </a>
                    </li>

                    <!-- FAQ -->
                    <li>
                        <a href="{{route('admin.faq')}}" title="FAQ">
                            <i class="fa fa-question-circle"></i>
                            <span style="font-size: 14px" class="label label-success"></span>
                        </a>
                    </li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li style="cursor: pointer" title="Preview Site" class="user user-menu">
                        <a href="{{route('index')}}" target="_blank"><i class="fa fa-home"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</div>

