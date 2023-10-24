@include('site/MasterLayout/tieude')
<section class="banner-section blog-banner top-margin">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content">
                    <h4 class="fw-500 color-ff">blog details</h4>
                    <p class="color-ff">Welcome to beauty lab, where you can relax and enjoy life.</p>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#">home</a></li>
                    <li class="active">blog details</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ======================================= 
            ==Start Blog section==  
    =======================================-->
    <section class="blog-section blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrapper">
                        <img src="{{asset("img/" . $data->img1)}}" alt="blog-details-img" class="img-fluid" />
                        <h5 class="title color-d5">{{$data->tieude1}}</h5>
                        <ul class="tags ptb-20">
                        </ul>
                        <p>
                            {{$data->noidung1}}
                        </p>

                        <div class="admin-details">
                            <img src="{{asset("img/" . $data->img2)}}" alt="admin">
                            <div class="admin-description color-ff">
                                <h5>Tên người quản lý: <span class="fw-500">Hoàng Anh</span></h5>
                                <p class="color-ff">Cảm ơn đã dành thời gian đọc bài viết</p>
                            </div>
                        </div>
                        <!--/admin details-->

                        <p>
                            {{$data->noidung2}}
                        </p>

                    </div>
                    <!--/blog post wrapper-->

                    
                </div>
                <!--/col-->

                <div class="col-lg-4">
                    <aside class="blog-sidebar clearfix">
                        <div class="search-widget single-widget">
                        </div>

                        <div class="latest-blog-area single-widget">
                            <h5 class="widget-title fw-500 pos-relative">Các Blog liên quan</h5>

                            <!--latest post-1-->
                            <div class="single-latest-post">
                                <a href="#"><img src="{{asset('site/HTML/images/latest-blog.jpg')}}" alt="latest-blog"></a>
                                <ul>
                                    <li>
                                        <h6><a href="#">Nivea for men’s sensitive hydro gel.</a></h6>
                                    </li>
                                    <li><a href="#">Beauty & Skin</a></li>
                                    <li>26 Oct 2020</li>
                                </ul>
                            </div>
                        <!-- /latest blog area-->

                        <div class="post-categories single-widget">
                            <h5 class="widget-title fw-500 pos-relative">Hiển thị cho đủ</h5>
                            <ul>
                                <li><a href="#">Hướng dẫn Makeup</a><span>10</span></li>
                                <li><a href="#">Hướng dẫn dưỡng tóc</a><span>70</span></li>
                                <li><a href="#">Làm trắng da tại nhà</a><span>05</span></li>
                                <li><a href="#">Body Massage</a><span>63</span></li>
                            </ul>
                        </div>
                        <!--/post categories-->

                        <div class="instagram-gallery single-widget">
                            <h5 class="widget-title fw-500 pos-relative">Instagram</h5>
                            <a href="#"><img src="{{asset('site/HTML/images/insta-img/insta-img1.jpg')}}" alt="insta-img" /></a>
                            <a href="#"><img src="{{asset('site/HTML/images/insta-img/insta-img2.jpg')}}" alt="insta-img" /></a>
                            <a href="#"><img src="{{asset("site/HTML/images/insta-img/insta-img3.jpg")}}" alt="insta-img" /></a>
                            <a href="#"><img src="{{asset('site/HTML/images/insta-img/insta-img4.jpg')}}" alt="insta-img" /></a>
                            <a href="#"><img src="{{asset('site/HTML/images/insta-img/insta-img5.jpg')}}" alt="insta-img" /></a>
                            <a href="#"><img src="{{asset('site/HTML/images/insta-img/insta-img6.jpg')}}" alt="insta-img" /></a>
                            <a href="#"><img src="{{asset('site/HTML/images/insta-img/insta-img7.jpg')}}" alt="insta-img" /></a>
                            <a href="#"><img src="{{asset('site/HTML/images/insta-img/insta-img8.jpg')}}" alt="insta-img" /></a>
                            <a href="#"><img src="{{asset('site/HTML/images/insta-img/insta-img9.jpg')}}" alt="insta-img" /></a>
                        </div>
                        <!--/instagram gallery-->
                    </aside>
                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </div>
    </section>
    <!-- ======================================= 
            ==End blog section== 
    =======================================-->


@include("site/MasterLayout/thongtin")