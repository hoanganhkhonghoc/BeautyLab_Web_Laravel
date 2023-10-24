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
        ==Start Treatment information section== 
    =======================================-->
    <section class="treatment-info-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                    <div class="info-content">
                        <h5 class="section-title color-72 fw-700 pos-relative pb-30">{{$data->tieude1}}</h5>
                        <ul>
                            
                        </ul>
                        <p class="info-details pt-15 pb-30">{{$data->noidung1}}</p>
                        <div class="quick-support-wrapper clearfix">
                            
                        </div>
                        <!--/wrapperr-->
                    </div>
                    <!--/content-->
                </div>
                <!--/col-->

                <div class="col-xl-5 offset-xl-1 col-lg-5">
                    <div class="treatment-info-img pos-relative">
                        <img src="{{asset('img/' . $data->img1)}}" alt="spa-treatments" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================================= 
        ==End Treatment information section== 
    =======================================-->


    <!-- ======================================= 
        ==Start Treatment details section==  
    =======================================-->
    <section class="treatment-details-section">
        <div class="container">
            <h5 class="section-title color-72 fw-700 pos-relative pb-30 text-capitalize">{{$data->tieude2}}</h5>
            <div class="row">
                <div class="col-lg-5 order-2 order-lg-1">
                    <div class="treatment-details-img pos-relative">
                        <img src="{{asset('img/' . $data->img2)}}" alt="spa-bed" class="img-fluid spa-bed">
                    </div>
                </div>

                <div class="col-lg-7 order-1 order-lg-2">
                    <div class="treatment-details">
                        <p>{{$data->noidung2}}</p>
                        <a href="#" class="brochure color-d5 fw-700"><i class="fa fa-file-pdf-o"></i>Cảm ơn đã đọc</a>
                    </div>
                </div>
                <!--/col-->
            </div>
        </div>
    </section>
    <!-- ======================================= 
        ==End Treatment details section==  
    =======================================-->


    <!-- ======================================= 
        ==Start related services section==  
    =======================================-->
    <section class="related-service-section">
        <div class="container">
            <h5 class="section-title color-72 fw-700 pos-relative pb-30">Hình ảnh liên quan</h5>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-service pos-relative">
                        <img src="{{asset('img/' . $data->img3)}}" alt="service img" class="img-fluid">
                        <div class="link-hover"><a href="service-details.html"><i class="fa fa-link color-ff"></i></a></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-service pos-relative">
                        <img src="{{asset('img/' . $data->img4)}}" alt="service img" class="img-fluid">
                        <div class="link-hover"><a href="service-details.html"><i class="fa fa-link color-ff"></i></a></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-service pos-relative">
                        <img src="{{asset('img/' . $data->img5)}}" alt="service img" class="img-fluid">
                        <div class="link-hover"><a href="service-details.html"><i class="fa fa-link color-ff"></i></a></div>
                    </div>
                </div>
                <!--/col-->
            </div>
        </div>
    </section>
    <!-- ======================================= 
        ==End related services section==  
    =======================================-->

@include("site/MasterLayout/thongtin")