<!DOCTYPE html>
<html lang="en-US" class="no-js">


<!-- Mirrored from beautylab.themecon.net/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 11:17:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Beauty Lab | Trang chủ</title>

    <!--favicon icon-->
    <link rel="icon" href="{{asset('site/HTML/images/favicon.png')}}">

    <!-- font awesome css -->
    <link rel="stylesheet" href="{{asset('site/HTML/css/font-awesome.min.css')}}">

    <!-- flaticon css -->
    <link rel="stylesheet" href="{{asset('site/HTML/css/flaticon.css')}}">

    <!--bootstrap min css-->
    <link rel="stylesheet" href="{{asset('site/HTML/css/bootstrap.min.css')}}">

    <!--jquery-ui css-->
    <link rel="stylesheet" href="{{asset('site/HTML/css/jquery-ui.min.css')}}">

    <!--menuzord css-->
    <link rel="stylesheet" href="{{asset('site/HTML/css/menuzord.css')}}">

    <!--animate css-->
    <link rel="stylesheet" href="{{asset('site/HTML/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('site/HTML/css/animate.css')}}">

    <!--owl.carousel css-->
    <link rel="stylesheet" href="{{asset('site/HTML/css/owl.carousel.min.css')}}">

    <!--nice-select css-->
    <link rel="stylesheet" href="{{asset('site/HTML/css/nice-select.css')}}">

    <!--venobox css-->
    <link rel="stylesheet" href="{{asset('site/HTML/css/venobox.css')}}">

    <!-- global style css -->
    <link rel="stylesheet" href="{{asset('site/HTML/css/global-style.css')}}">

    <!-- style css -->
    <link rel="stylesheet" href="{{asset('site/HTML/style.css')}}">

    <!-- color css -->
    <link rel="stylesheet" href="{{asset('site/HTML/css/colors/color-1.css')}}">

    <!--responsive css-->
    <link rel="stylesheet" href="{{asset('site/HTML/css/responsive.css')}}">

    <!-- preloading animation -->
    <link rel="stylesheet" href="{{asset('site/style.css')}}">

    <!-- login css -->
    <link rel="stylesheet" href="{{asset('site/HTML/css/login.css')}}">

    <link rel="stylesheet" href="{{asset('site/HTML/css/woocommerce.css')}}">
    <link rel="stylesheet" href="{{asset('site/HTML/css/woocommerce-layout.css')}}">

</head>

<body>
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


    <!-- search-modal -->
    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <img src="{{asset('site/HTML/images/search-popup-logo.png')}}" alt="search-popup-logo">
                <form action="index.php?c=sreach&a=index" class="form-inline" method="post">
                    <input type="text" name="key" placeholder="Tại đây...">
                    <button type="submit" name="submit"><i class="fa fa-search"></i></button>
                </form>
                <div class="quick-search">
                    <h6 class="color-ff pos-relative ptb-30">Một số lựa chọn</h6>
                    <ul>
                        <li><a href="#">parlour</a></li>
                        <li><a href="#">massage</a></li>
                        <li><a href="#">yoga</a></li>
                        <li><a href="#">spa</a></li>
                        <li><a href="#">beauty</a></li>
                        <li><a href="#">exparts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- ======================================= 
        ==Start Header section==  
    =======================================-->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="opening-time text-left"><i class="fa fa-clock-o color-d5"></i><span>Mở cửa: T2 - T6 : 09:00 - 18:00</span> </div>
                </div>

                <div class="col-md-6">
                    <div class="contact-mail text-right">
                        <a href="{{asset('site/cdn-cgi/l/email-protection.html#2a444c456a484f4b5f5e53464b4804494547')}}"><i class="fa fa-envelope color-d5"></i><span class="__cf_email__" data-cfemail="0b62656d644b696e6a7e7f72676a6925686466">[email&#160;protected]</span></a>
                        <span>/</span>
                        <a href="tel:0869737005"><i class="fa fa-phone color-d5"></i>0869737005</a>
                        <span>/</span>
                        <a href="<?php 
                                    // if (!isset($_SESSION['account']['level'])) {
                                    //     echo 'index.php?c=index&a=login';
                                    // } else {
                                    //     echo 'index.php?c=index&a=logout';
                                    // } 
                                    ?>">
                            <i class="fa color-d5"><ion-icon name="person-circle-outline"></ion-icon></i><?php
                                                                                                            // if (!isset($_SESSION['account']['level'])) {
                                                                                                            //     echo 'Đăng nhập';
                                                                                                            // } else {
                                                                                                            //     echo 'Đăng xuất';
                                                                                                            // }
                                                                                                            ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="beauty-header" id="beauty-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="menuzord" class="menuzord">
                        <a href="index.php?c=index&a=" class="menuzord-brand custom-logo"><img id="logo" src="{{asset('site/HTML/images/logo.png')}}" alt="logo"></a>
                        <ul class="menuzord-menu menuzord-right">
                            <!-- <li><a href="#" title="Service">Service</a>
                                <ul class="dropdown triangle">
                                    <li><a href="service.html">Service page</a></li>
                                    <li><a href="service-details.html">Service Details</a></li>
                                </ul>
                            </li> -->
                            <li><a href="#" title="Pages">Tuỳ chọn</a>
                                <ul class="dropdown triangle">
                                    <li><a href="index.php">Giới thiệu</a></li>
                                    <li><a href="<?php 
                                                    // if (isset($_SESSION['account']['id'])) {
                                                    //     echo 'index.php?c=product&a=like_list&id=' . $_SESSION['account']['id'];
                                                    // } else {
                                                    //     echo 'index.php?c=index&a=login';
                                                    // }
                                                     ?>">Sản phẩm đã thích</a></li>
                                    <li><a href="index.php?c=product&a=showAll">Danh sách sản phẩm</a></li>
                                    <li><a href="<?php 
                                                    // if (isset($_SESSION['account']['id'])) {
                                                    //     echo "index.php?c=card&a=list";
                                                    // } else {
                                                    //     echo "index.php?c=index&a=login";
                                                    // }
                                                     ?>">Giỏ hàng</a></li>
                                    <li><a href="index.php">Đặt lịch</a></li>
                                    <?php //if(isset($_SESSION['account']['id'])){ ?><li><a href="index.php?c=order&a=list">Lịch sử mua hàng</a></li><?php //} ?>
                                    <!-- <li><a href="error.html">404 page</a></li> -->
                                </ul>
                            </li>
                            <li><a href="#" title="Shop">Cửa hàng</a>
                                <div class="megamenu">
                                    <div class="megamenu-row">
                                        <div class="col3 clearfix">
                                            <ul>
                                                <li>
                                                    <h6>Tất cả</h6>
                                                </li>
                                                <li><a href="index.php?c=product&a=showAll">Tất cả sản phẩm hiện có</a></li>
                                            </ul>
                                        </div>

                                        <div class="col6">
                                            <div class="header-ad">
                                                <img src="{{asset('site/HTML/images/vibes-laser.png')}}" alt="add img" class="img-fluid">
                                            </div>
                                        </div>
                                        <!--/col-->
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="button" id="search-button" data-toggle="modal" data-target="#search-modal"><i class="fa fa-search"></i></button>
                    </div>
                    <!--/#menuzord-->
                </div>
                <!--/col-md-12-->
            </div>
        </div>
    </header>
    <!-- ======================================= 
        ==End Header section==  
    =======================================-->
