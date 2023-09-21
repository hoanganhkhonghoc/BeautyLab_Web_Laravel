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












    <!-- ======================================= 
            ==Start google map section==  
    =======================================-->
    <!-- <section class="google-map-section">
        <div id="map" class="mapHome1"></div>
    </section> -->
    <!-- ======================================= 
            ==End google map section== 
    =======================================-->


    <!-- ======================================= 
            ==Start call to action section==  
    =======================================-->
    <section class="cta-section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <p>Đặt trước tại đây để được giảm tới <span class="color-d5">25%</span> !</p>
                        <a href="index.php">Đặt lịch hẹn</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================================= 
            ==End call to action section== 
    =======================================-->


    <!-- ======================================= 
            ==Start footer widget section==  
    =======================================-->
    <section class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-widget contact-widget">
                        <a href="index.html"><img alt="logo" src="{{asset('site/HTML/images/widget-logo.png')}}"></a>
                        <p>The beauty lab là một giải pháp spa &amp; và làm đẹp sang trọng. Spa làm đẹp cố gắng mang đến đẳng cấp hàng đầu.</p>
                        <address>
                            <p class="address"><i class="fa fa-home"></i><span>Địa chỉ:</span> Cơ sở 1: 39 Phúc Đồng, Long Biên, Hà Nội</p>
                            <p class="address"><i class="fa fa-home"></i><span>Địa chỉ:</span> Cơ sở 2: 68 Hồng Tiến, Long Biên, Hà Nội</p>
                            <p class="phone"><i class="fa fa-phone"></i><span>Liên hệ:</span> +84 0869-737-005</p>
                            <p class="email"><i class="fa fa-envelope"></i><span>Email:</span> <a href=":mailto:info@beautylab.com"><span class="__cf_email__" data-cfemail="fe97909891be9c9b9f8b8a87929f9cd09d9193">[email&#160;protected]</span></a></p>
                            <p class="web"><i class="fa fa-globe"></i><span>Website:</span> <a href="index.php?c=index&a=" target="_blank">Beautylab.com</a></p>
                        </address>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="single-widget recent-post-widget">
                        <h5>Beauty lab</h5>
                        <ul>
                            <li>
                                <p>Một trong những thiên đường Spa</p>
                            </li>
                            <li>
                                <p>Một trong những thiên đường làm đẹp</p>
                            </li>
                            <li>
                                <p>Điểm đến thành công</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="single-widget newsletter-widget">
                        <h5>Đăng ký nhân viên / học viên</h5>
                        <form action="index.php?c=index&a=newStaff" method="post" class="clearfix">
                            <input type="text" placeholder="Tên" id="name" name="name" class="form-control">
                            <input type="email" placeholder="Email" id="email" name="email" class="form-control">
                            <button type="submit" name="submit">Đăng ký</button>
                        </form>
                    </div>
                </div>
                <!--/col-->
            </div>
        </div>
    </section>
    <!-- ======================================= 
            ==End footer widget section== 
    =======================================-->


    <!-- ======================================= 
            ==Start footer section==  
    =======================================-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="copyright">&copy; Khai trương 2023. Được tạo lên bởi <a target="_blank" href="https://themecon.net/">Hoàng Anh</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ======================================= 
            ==End footer section== 
    =======================================-->


    <!-- ======================================= 
        ==Start scroll top==  
    =======================================-->
    <div class="scroll-top not-visible"><i class="fa fa-angle-up"></i></div>
    <!-- =======================================
        ==End scroll top==  
    =======================================-->

    <!-- jQuary library -->
    <script data-cfasync="false" src="{{asset('site/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script src="{{asset('site/HTML/js/jquery-3.2.1.min.js')}}"></script>

    <!--bootstrap js-->
    <script src="{{asset('site/HTML/js/popper.min.js')}}"></script>
    <script src="{{asset('site/HTML/js/bootstrap.min.js')}}"></script>

    <!--jquery-ui js-->
    <script src="{{asset('site/HTML/js/jquery-ui.min.js')}}"></script>

    <!--menuzord js-->
    <script src="{{asset('site/HTML/js/menuzord.js')}}"></script>

    <!--slick js-->
    <script src="{{asset('site/HTML/js/slick.js')}}"></script>

    <!--owl.carousel js-->
    <script src="{{asset('site/HTML/js/owl.carousel.min.js')}}"></script>

    <!--nice-select js-->
    <script src="{{asset('site/HTML/js/jquery.nice-select.min.js')}}"></script>

    <!--venobox js-->
    <script src="{{asset('site/HTML/js/venobox.min.js')}}"></script>

    <!--counterup js-->
    <script src="{{asset('site/HTML/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('site/HTML/js/waypoints.min.js')}}"></script>

    <!--vide js for background video-->
    <script type="text/javascript" src="{{asset('site/HTML/js/jquery.vide.js')}}"></script>

    <!--isotope js-->
    <script src="{{asset('site/HTML/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('site/HTML/js/imagesloaded.pkgd.min.js')}}"></script>

    <!--google map js-->
    <script type="text/javascript" src="{{asset('site/HTML/js/map.control.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuE-L3bIAAbYiHgFs5tVRBg03HiLojuks&amp;callback=myMap"></script>

    <!-- all jQuary activation code here and always it will be bottom of all script tag -->
    <script src="{{asset('site/HTML/js/main.js')}}"></script>

    <!-- preloading animation -->
    <script src="{{asset('site/js/main.js')}}"></script>


</body>
<!-- icon -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"> </script>
<script nomodule src="https://unpkg.com/browse/ionicons@4.2.4/dist/ionicons.js"> </script>

<!-- Mirrored from beautylab.themecon.net/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 11:17:59 GMT -->

</html>