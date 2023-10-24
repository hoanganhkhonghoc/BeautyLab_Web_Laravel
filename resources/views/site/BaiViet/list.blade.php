
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
    <section class="blog-section blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-2">

                    <div class="row">
                        @foreach ($data as $post)
                        <div class="col-md-6">
                            <div class="single-blog">
                                <div class="blog-img pos-relative">
                                    <div class="img-area">
                                        <a href="/site/baiviet/show/{{$post['id']}}"><img src="{{asset('img/' . $post['img1'])}}" alt="blog img" class="img-fluid"></a>
                                    </div>
                                    <ul class="brand">
                                    </ul>
                                    <div class="date">
                                        <h5 class="fw-700 color-ff">{{$post['created_at']->day}}</h5>
                                        <span class="fw-500 roboto color-ff text-uppercase">{{$post['created_at']->toDateString()}}</span>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <a href="/site/baiviet/show/{{$post['id']}}" class="title fw-500 pt-20">{{$post['tieude1']}}</a>
                                    <p>{{$post['tieude2']}}</p>
                                    <a href="/site/baiviet/show/{{$post['id']}}" class="readmore" title="Read More for Details" target="-blank">Đọc ngay <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--/row-->

                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination pt-20">
                                <li>
                                    <a href="#"><i class="fa fa-angle-left"></i></a>
                                    <a href="#" class="current-item">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#">4</a>
                                    <a href="#">5</a>
                                    <a href="#"><i class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <!--/col-->

                <div class="col-lg-4 order-lg-1">
                    <aside class="blog-sidebar">
                        

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
                                    <li></li>
                                </ul>
                            </div>

                            <!--latest post-2-->
                            <div class="single-latest-post">
                                <a href="#"><img src="{{asset('site/HTML/images/latest-blog2.jpg')}}" alt="latest-blog"></a>
                                <ul>
                                    <li>
                                        <h6><a href="#">Nivea for men’s sensitive hydro gel.</a></h6>
                                    </li>
                                    <li><a href="#">Beauty & Skin</a></li>
                                    <li></li>
                                </ul>
                            </div>

                            <!--latest post-3-->
                            <div class="single-latest-post">
                                <a href="#"><img src="{{asset('site/HTML/images/latest-blog3.jpg')}}" alt="latest-blog"></a>
                                <ul>
                                    <li>
                                        <h6><a href="#">Nivea for men’s sensitive hydro gel.</a></h6>
                                    </li>
                                    <li><a href="#">Beauty & Skin</a></li>
                                    <li></li>
                                </ul>
                            </div>
                            <!-- /single latest blog-->
                        </div>
                        <!-- /latest blog area-->

                        <div class="post-categories single-widget">
                            <h5 class="widget-title fw-500 pos-relative">Post Categories</h5>
                            <ul>
                                <li><a href="#">Hướng dẫn Makeup</a><span>10</span></li>
                                <li><a href="#">Hướng dẫn dưỡng tóc</a><span>70</span></li>
                                <li><a href="#">Làm trắng da tại nhà</a><span>05</span></li>
                                <li><a href="#">Body Massage</a><span>63</span></li>
                            </ul>
                        </div>
                        <!--/post categories-->

                        
                        <!--/archives-->

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