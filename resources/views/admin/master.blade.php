<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamspos.dreamguystech.com/html/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 May 2023 10:23:08 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">

    <title>Beauty lab Admin</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('site/images/fabicon.png')}}">

    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/fontawesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/select2.min.css')}}">


    <!-- preloading animation -->
    <link rel="stylesheet" href="{{asset('site/style.css')}}">
</head>

<body>

    <!-- <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div> -->

    <!-- ======================================= 
            ==Start loading== 
    =======================================-->
    <div id="preloader">
        <div class="loader">
            Chờ xíu nha !!
            <span class="dot-one">.</span>
            <span class="dot-two">.</span>
            <span class="dot-three">.</span>
        </div>
    </div>
    <!-- ======================================= 
            ==End preloading== 
    =======================================-->

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.php" class="logo logo-normal">
                    <img src="{{asset('site/HTML/images/widget-logo.png')}}" alt>
                </a>
                <a href="index.php" class="logo logo-white">
                    <img src="{{asset('site/HTML/images/widget-logo.png')}}" alt>
                </a>
                <a href="index.php" class="logo-small">
                    <img src="{{asset('site/images/fabicon.png')}}" alt>
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                    <i data-feather="chevrons-left" class="feather-16"></i>
                </a>
            </div>

            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-info">
                            <span class="user-detail">
                                <span class="user-name"><?php //echo $_SESSION['account']['name']; ?></span>
                                <span class="user-role"><?php 
                                                        // if ($_SESSION['account']['level'] == 1) {
                                                        //     echo 'Quản lý cửa hàng';
                                                        // } else {
                                                        //     echo 'Nhân viên';
                                                        // } 
                                                        ?></span>
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img">
                                    <ion-icon style="font-size: 30px;" name="person-circle-outline"></ion-icon>
                                    <span class="status online"></span>
                                </span>
                                <div class="profilesets">
                                    <h6><?php //echo $_SESSION['account']['name']; ?></h6>
                                    <h5><?php 
                                        // if ($_SESSION['account']['level'] == 1) {
                                        //     echo 'Quản lý';
                                        // } else {
                                        //     echo 'Nhân viên';
                                        // } 
                                        ?></h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="index.php?c=index&a=account"> <i class="me-2" data-feather="user"></i>Thông tin tài khoản</a>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="index.php?c=index&a=logout"><ion-icon name="exit-outline" class="me-2"></ion-icon>Đăng xuất</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Trang chủ</h6>
                            <ul>
                                <li class="active">
                                    <a href="/admin/home/index"><i data-feather="grid"></i><span>Dashboard</span></a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i data-feather="smartphone"></i><span>Quản lý</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        @if(session('account.level') == 1 || session('Quyen_Han.ql_binhluan') == 1)
                                            <li><a href="#">Bình luận</a></li>
                                        @endif
                                        
                                        @if(session('account.level') == 1 || session('Quyen_Han.ql_lichdattruoc') == 1)
                                            <li><a href="index.php?c=appointment&a=index&month=<?php 
                                                                                            // $date = getdate();
                                                                                            // echo $date['mon']; 
                                                                                            ?>">Lịch đặt trước</a></li>
                                        @endif

                                        @if(session('account.level') == 1 || session('Quyen_Han.ql_tuyendung') == 1)
                                            <li><a href="#">Tuyển dụng</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        @if(session('account.level') == 1 || session('Quyen_Han.ql_sanpham') == 1)
                            <li class="submenu-open">
                                <h6 class="submenu-hdr">Quản lý sản phẩm</h6>
                                <ul>
                                    <li><a href="#"><i data-feather="box"></i><span>Sản phẩm</span></a></li>
                                    <li><a href="#"><i data-feather="plus-square"></i><span>Thêm sản phẩm</span></a></li>
                                    <li><a href="#"><i data-feather="codepen"></i><span>Danh mục</span></a></li>
                                    <li><a href="#"><i data-feather="speaker"></i><span>Thêm danh mục</span></a></li>
                                </ul>
                            </li>
                        @endif

                        @if(session('account.level') == 1 || session('Quyen_Han.ql_donhang') == 1)
                            <li class="submenu-open">
                                <h6 class="submenu-hdr">Quản lý đơn hàng</h6>
                                <ul>
                                    <li class="submenu">
                                        <a href="#"><i data-feather="file-text"></i><span>Đơn hàng</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="#">Tất cả đơn hàng</a></li>
                                            <li><a href="#">Đơn hàng chờ xử lý</a></li>
                                            <li><a href="#">Đơn hàng đang giao</a></li>
                                            <li><a href="#">Đơn hàng đã huỷ</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Quản lý chung</h6>
                            <ul>

                                @if(session('account.level') == 1)
                                    <li><a href="#"><i data-feather="user"></i><span>Cơ sở</span></a></li>
                                    <li><a href="#"><i data-feather="users"></i><span>Nhân viên</span></a></li>
                                    <li><a href="#"><i data-feather="users"></i><span>Quyền hạn của nhân viên</span></a></li>
                                @endif

                                @if(session('account.level') == 1 || session('Quyen_Han.ql_khachhang') == 1)
                                    <li><a href="#"><i data-feather="users"></i><span>Khách hàng</span></a></li>
                                @endif
                            </ul>
                        </li>

                        @if(session('account.level') == 1 || session('Quyen_Han.ql_baiviet') == 1)
                            <li class="submenu-open">
                                <h6 class="submenu-hdr">Quản lý bài viết</h6>
                                <ul>
                                    <li>
                                        <a href="#"><i data-feather="file"></i><span>Bài viết</span> </a>
                                    </li>
                                    <li>
                                        <a href="#"><i data-feather="pen-tool"></i><span>Viết bài</span> </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Cài đặt</h6>
                            <ul>
                                <li>
                                    <a href="index.php?c=index&a=logout"><i data-feather="log-out"></i><span>Đăng xuất</span> </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @include($data['view'])

    <script src="{{asset('admin/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('admin/js/feather.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('admin/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/js/chart-data.js')}}"></script>

    <script src="{{asset('admin/js/script.js')}}"></script>

    <script src="{{asset('admin/js/jquery-ui.min.js')}}"></script>
    <!-- preloading animation -->
    <script src="{{asset('site/js/main.js')}}"></script>
</body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script>
<script nomodule src="https://unpkg.com/browse/ionicons@4.2.4/dist/ionicons.js"> </script>

</html>