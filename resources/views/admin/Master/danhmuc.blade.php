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
                <a href="/admin/home/index" class="logo logo-normal">
                    <img src="{{asset('site/HTML/images/widget-logo.png')}}" alt>
                </a>
                <a href="/admin/home/index" class="logo logo-white">
                    <img src="{{asset('site/HTML/images/widget-logo.png')}}" alt>
                </a>
                <a href="/admin/home/index" class="logo-small">
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
                                <span class="user-name">
                                    @if(Auth::guard("admin")->check())
                                        {{Auth::guard("admin")->user()->name}}
                                    @endif
                                    @if(Auth::guard("staff")->check())
                                        {{Auth::guard("staff")->user()->name}}
                                    @endif
                                </span>
                                <span class="user-role">
                                    @if(Auth::guard("admin")->check())
                                        Quản lý của hàng
                                    @endif
                                    @if(Auth::guard("staff")->check())
                                        Nhân viên
                                    @endif
                                </span>
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
                                    <h6>
                                        @if(Auth::guard("admin")->check())
                                            {{Auth::guard("admin")->user()->name}}
                                        @endif
                                        @if(Auth::guard("staff")->check())
                                            {{Auth::guard("staff")->user()->name}}
                                        @endif
                                    </h6>
                                    <h5>
                                        @if(Auth::guard("admin")->check())
                                            Quản lý
                                        @endif
                                        @if(Auth::guard("staff")->check())
                                            Nhân viên
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="/admin/account/show"> <i class="me-2" data-feather="user"></i>Thông tin tài khoản</a>
                            <hr class="m-0">
                            <a class="dropdown-item logout pb-0" href="/logout"><ion-icon name="exit-outline" class="me-2"></ion-icon>Đăng xuất</a>
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
                                        
                                        @if(Auth::guard("admin")->check() || Session::get("QuyenHan")->ql_binhluan == 1)
                                            <li><a href="index.php?c=comment&a=index">Bình luận</a></li>
                                        @endif
                                        
                                        @if(Auth::guard("admin")->check() || Session::get("QuyenHan")->ql_lichdattruoc == 1)
                                            <li><a href="index.php?c=appointment&a=index&month=<?php 
                                                                                            // $date = getdate();
                                                                                            // echo $date['mon']; 
                                                                                            ?>">Lịch đặt trước</a></li>
                                        @endif

                                        @if(Auth::guard("admin")->check() || Session::get("QuyenHan")->ql_tuyendung == 1)
                                            <li><a href="index.php?c=staff&a=newStaff">Tuyển dụng</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        @if(Auth::guard("admin")->check() || Session::get("QuyenHan")->ql_sanpham == 1)
                            <li class="submenu-open">
                                <h6 class="submenu-hdr">Quản lý sản phẩm</h6>
                                <ul>
                                    <li><a href="/admin/product/list"><i data-feather="box"></i><span>Sản phẩm</span></a></li>
                                    <li><a href="/admin/product/addView"><i data-feather="plus-square"></i><span>Thêm sản phẩm</span></a></li>
                                    <li><a href="/admin/category/list"><i data-feather="codepen"></i><span>Danh mục</span></a></li>
                                    <li><a href="/admin/category/addView"><i data-feather="speaker"></i><span>Thêm danh mục</span></a></li>
                                </ul>
                            </li>
                        @endif

                        @if(Auth::guard("admin")->check() || Session::get("QuyenHan")->ql_donhang == 1)
                            <li class="submenu-open">
                                <h6 class="submenu-hdr">Quản lý đơn hàng</h6>
                                <ul>
                                    <li class="submenu">
                                        <a href="/admin/order/list"><i data-feather="file-text"></i><span>Đơn hàng</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="/admin/order/list">Tất cả đơn hàng</a></li>
                                            <li><a href="/admin/order/selectedOrder/1">Đơn hàng chờ xử lý</a></li>
                                            <li><a href="/admin/order/selectedOrder/2">Đơn hàng đang giao</a></li>
                                            <li><a href="/admin/order/selectedOrder/0">Đơn hàng đã huỷ</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Quản lý chung</h6>
                            <ul>
                                @if(Auth::guard("admin")->check())
                                    <li><a href="/admin/facilities/list"><i data-feather="user"></i><span>Cơ sở</span></a></li>
                                    <li><a href="/admin/staff/list"><i data-feather="users"></i><span>Nhân viên</span></a></li>
                                    <li><a href="/admin/quyen/list"><i data-feather="users"></i><span>Quyền hạn của nhân viên</span></a></li>
                                @endif
                                @if(Auth::guard("admin")->check() || Session::get("QuyenHan")->ql_khachhang == 1)
                                    <li><a href="/admin/client/list"><i data-feather="users"></i><span>Khách hàng</span></a></li>
                                @endif
                            </ul>
                        </li>

                        @if(Auth::guard("admin")->check() || Session::get("QuyenHan")->ql_baiviet == 1)
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
                                    <a href="/logout"><i data-feather="log-out"></i><span>Đăng xuất</span> </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>