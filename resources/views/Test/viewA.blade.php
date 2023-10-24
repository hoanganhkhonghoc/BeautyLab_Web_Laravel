@include('site/MasterLayout/tieude')

 <!-- ======================================= 
        ==Start Treatment information section== 
    =======================================-->
    <section class="treatment-info-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                    <div class="info-content">
                        <h5 class="section-title color-72 fw-700 pos-relative pb-30">Treatment Informations</h5>
                        <ul>
                            <li><span class="fw-700">Time:</span> Tue / 14:00-18:00 , Fri / 9:00-15:00</li>
                            <li><span class="fw-700">Staff:</span> Dania Landy</li>
                            <li><span class="fw-700">Price:</span> $70</li>
                            <li><span class="fw-700">Duration:</span> <span class="color-d5">1.3 Hour</span></li>
                        </ul>
                        <p class="info-details pt-15 pb-30">Most designers set their type arbitrarily, either by pulling values out of the sky or by adhering to a baseline grid. The former case isn’t worth discussing here, but the latter requires a closer look.</p>
                        <div class="quick-support-wrapper clearfix">
                            <div class="single-support float-left">
                                <i class="fa fa-comments-o"></i>
                                <div class="content">
                                    <h6 class="color-72 text-capitalize">Our Hotline</h6>
                                    <p>(+880) 1800-111-333</p>
                                </div>
                            </div>

                            <div class="single-support float-left">
                                <i class="flaticon-school-calendar"></i>
                                <div class="content">
                                    <h6 class="color-72 text-capitalize">We Are Open</h6>
                                    <p>Mon - Fri : 09:00 - 18:00</p>
                                </div>
                            </div>
                        </div>
                        <!--/wrapperr-->
                    </div>
                    <!--/content-->
                </div>
                <!--/col-->

                <div class="col-xl-5 offset-xl-1 col-lg-5">
                    <div class="treatment-info-img pos-relative">
                        <img src="images/spa-treatments.jpg" alt="spa-treatments" class="img-fluid">
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
            <h5 class="section-title color-72 fw-700 pos-relative pb-30 text-capitalize">Treatment Details</h5>
            <div class="row">
                <div class="col-lg-5 order-2 order-lg-1">
                    <div class="treatment-details-img pos-relative">
                        <img src="images/spa-bed.jpg" alt="spa-bed" class="img-fluid spa-bed">
                    </div>
                </div>

                <div class="col-lg-7 order-1 order-lg-2">
                    <div class="treatment-details">
                        <p>As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page. <br/><br/> Instead of relying on arbitrary selection, wouldn’t it be nice if there were a way to determine the perfect typography settings based on a given context? <br/><br/> As it turns out, the golden ratio provides us with a guide—a formula—for prop er typesetting. Because of this, we can now set our type with absolute certainty in any situation! Better still, we can use this information about typography...</p>
                        <a href="#" class="brochure color-d5 fw-700"><i class="fa fa-file-pdf-o"></i> Download Brochure</a>
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
            <h5 class="section-title color-72 fw-700 pos-relative pb-30">Related Services </h5>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-service pos-relative">
                        <img src="images/service-img7.jpg" alt="service img" class="img-fluid">
                        <div class="link-hover"><a href="service-details.html"><i class="fa fa-link color-ff"></i></a></div>
                        <h6><a href="service-details.html" class="color-d5">Beauty Treatment</a><span class="float-right fw-500">$59</span></h6>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-service pos-relative">
                        <img src="images/service-img8.jpg" alt="service img" class="img-fluid">
                        <div class="link-hover"><a href="service-details.html"><i class="fa fa-link color-ff"></i></a></div>
                        <h6><a href="service-details.html" class="color-d5">Spa Process</a><span class="float-right fw-500">$70</span></h6>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-service pos-relative">
                        <img src="images/service-img9.jpg" alt="service img" class="img-fluid">
                        <div class="link-hover"><a href="service-details.html"><i class="fa fa-link color-ff"></i></a></div>
                        <h6><a href="service-details.html" class="color-d5">Manicure & Pedicure</a><span class="float-right fw-500">$40</span></h6>
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