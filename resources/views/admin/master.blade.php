<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/Ionicons/css/ionicons.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin/css/AdminLTE.min.css') }}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('public/admin/css/skins/_all-skins.min.css') }}">

    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/morris.js/morris.css') }}">

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('public/admin/bower_components/jvectormap/jquery-jvectormap.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="{{ asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- DataTables CSS -->
    <link href="{{ asset('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}"
          rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}"
          rel="stylesheet">

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/css/mystyle.css') }}">

    <!-- CKEditor & CKFinder -->
    <script type="text/javascript" src="{{ url('public/admin/js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ url('public/admin/js/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
        var baseURL = "{!! url('/') !!}";
    </script>
    <script type="text/javascript" src="{{ url('public/admin/js/func_ckfinder.js') }}"></script>
    <!-- End: CKEditor & CKFinder -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>TP</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Tuấn Phương</b> Sports</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('resources/upload/images/thcong.jpg') }}" class="user-image"
                                     alt="User Image">
                                <span class="hidden-xs">Tạ Hữu Công</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('resources/upload/images/thcong.jpg') }}" class="img-circle"
                                         alt="User Image">

                                    <p>
                                        Tạ Hữu Công - Admin
                                        <small>Từ 9/2017</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('resources/upload/images/thcong.jpg') }}" class="img-circle"
                             alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Tạ Hữu Công</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="mytreeview" id="home">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Trang chủ</span>
                        </a>
                    </li>

                    <li class="mytreeview" id="category">
                        <a href="{!! URL::route('admin.cate.getList') !!}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Quản lý thể loại</span>
                        </a>
                    </li>

                    <li class="mytreeview" id="sport">
                        <a href="{!! URL::route('admin.sport.getList') !!}">
                            <i class="fa fa-futbol-o" aria-hidden="true"></i>
                            <span>Quản lý bộ môn</span>
                        </a>
                    </li>

                    <li class="mytreeview" id="brand">
                        <a href="{!! URL::route('admin.brand.getList') !!}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Quản lý thương hiệu</span>
                        </a>
                    </li>

                    <li class="treeview mytreeview" id="product">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Quản lý sản phẩm</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="listproduct"><a href="{!! URL::route('admin.product.getList') !!}"><i class="fa fa-circle-o"></i>Danh sách sản phẩm</a></li>
                            <li id="listproperty"><a href="{!! URL::route('admin.property.getList') !!}"><i class="fa fa-circle-o"></i> Thuộc tính sản phẩm khác</a></li>
                        </ul>
                    </li>

                    <li class="mytreeview" id="newscate">
                        <a href="{!! URL::route('admin.newscate.getList') !!}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Quản lý loại tin</span>
                        </a>
                    </li>

                    <li class="mytreeview" id="news">
                        <a href="{!! URL::route('admin.news.getList') !!}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Quản lý tin tức</span>
                        </a>
                    </li>

                    <li class="mytreeview" id="largebanner">
                        <a href="{!! URL::route('admin.largebanner.getList') !!}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Quản lý banner lớn</span>
                        </a>
                    </li>

                    <li class="mytreeview" id="smallbanner">
                        <a href="{!! URL::route('admin.smallbanner.getList') !!}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Quản lý banner nhỏ</span>
                        </a>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- /.main-sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('controller')
                    <small>@yield('action')</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li class="active">@yield('breadcrumb')</li>
                </ol>
            </section>
            <!-- /.content-header -->

            {{-- Hiển thị thông báo khi thêm, sửa, xóa dữ liệu: flash_level ở đây là cấp độ của thông báo, có thể là success, danger...; flash_message là nội dung thông báo; 2 thành phần này được truyền từ controller sang --}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    @if (Session::has('flash_message'))
                        <div class="message alert alert-{!! Session::get('flash_level') !!}">
                            <p class="text-center">{!! Session::get('flash_message') !!}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Main content -->
        @yield('content')
        <!-- /.Main content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>THC</b>
            </div>
            <strong>Copyright &copy; 2017</strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('public/admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/admin/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Morris.js charts -->
    <script src="{{ asset('public/admin/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('public/admin/bower_components/morris.js/morris.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('public/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- jvectormap -->
    <script src="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{ asset('public/admin/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>

    <!-- daterangepicker -->
    <script src="{{ asset('public/admin/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

    <!-- Slimscroll -->
    <script src="{{ asset('public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- FastClick -->
    <script src="{{ asset('public/admin/bower_components/fastclick/lib/fastclick.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('public/admin/js/adminlte.min.js') }}"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('public/admin/js/pages/dashboard.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/admin/js/demo.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{ asset('public/admin/bower_components/dataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

    <!-- My JS -->
    <script src="{{ asset('public/admin/js/myscript.js') }}"></script>

    @yield('custom javascript')

</body>
</html>
