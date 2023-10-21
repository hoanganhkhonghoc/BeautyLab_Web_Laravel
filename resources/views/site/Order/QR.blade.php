@include('site/MasterLayout/tieude')
    <section class="banner-section shop-banner top-margin">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h4 class="fw-500 color-ff">Hãy mua những gì bạn thích</h4>
                        <p class="color-ff">Chào mừng đến với Beautylab nơi thiên đường của sắc đẹp</p>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="/">Trang chủ</a></li>
                        <li class="active"><a href="/site/product/list" style="color:white">Cửa hàng ( sản phẩm )</a></li>
                        <li class="active">Quét mã QR để thanh toán</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================================= 
            ==End banner section==  
        =======================================-->
    
    
    <!-- ======================================= 
            ==Start Product gallery section== 
        =======================================-->
    <section class="product-gallery with-sidebar product-details-section">
        <div class="container">
    
            <div class="row">
    
                <div class="col-lg-9 order-lg-2">
    
                    <div class="product-details-wrapper">
                        <div class="product-preview-area">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pro-item1" role="tabpanel">
                                    <img src="{{asset('img/qrcode.jpg')}}" alt="product-img" class="img-fluid">
                                </div>
                                <div class="tab-pane fade" id="pro-item2" role="tabpanel">
                                    <!-- <img src="" alt="product-img" class="img-fluid"> -->
                                </div>
                                <div class="tab-pane fade" id="pro-item3" role="tabpanel">
                                    <!-- <img src="" alt="product-img" class="img-fluid"> -->
                                </div>
                                <div class="tab-pane fade" id="pro-item4" role="tabpanel">
                                    <!-- <img src="" alt="product-img" class="img-fluid"> -->
                                </div>
                            </div>
    
                            <nav>
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-item1" role="tab" aria-selected="true">
                                        <!-- <img src="" alt="product-img" class="img-fluid"> -->
                                    </a>
                                    <a data-toggle="tab" href="#pro-item2" role="tab" aria-selected="false">
                                        <!-- <img src="" alt="product-img" class="img-fluid"> -->
                                    </a>
                                    <a data-toggle="tab" href="#pro-item3" role="tab" aria-selected="false">
                                        <!-- <img src="" alt="product-img" class="img-fluid"> -->
                                    </a>
                                    <a data-toggle="tab" href="#pro-item4" role="tab" aria-selected="false">
                                        <!-- <img src="" alt="product-img" class="img-fluid"> -->
                                    </a>
                                </div>
                            </nav>
    
                        </div>
                        <!--/product preview area-->
    
                        <!--product details content-->
                        <div class="product-details-content">
                            <h6 class="procuct-title color-d5 fw-700 text-uppercase pb-15">Chú ý (Nhập nội dung đúng!!)</h6>
                            <ul class="rating">
                            </ul>
                            <h4 class="price fw-700 color-72 pt-20 pb-10">Tổng tiền đơn hàng: {{number_format($price) . " VNĐ"}}</h4>
                            <p class="price fw-700 color-72 pt-20 pb-10">Nội dung chuyển khoản: {{"CKO$" . $idOrder . "_" . $price}}</p>
                            <p class="price fw-700 color-72 pt-20 pb-10">Nếu bạn đã chuyển khoản thành công hãy ấn </p>
                            <ul class="add-cart-area pb-35">
                                <li>
                                    <button class="addtocart color-ff text-uppercase" onclick="window.location.href = '/site/order/thankyou';">Chuyển Khoản thành công</button>
                                </li>
                            </ul>
                        </div>
                        <!--/product details content-->
    
                    </div>
                    <!--/wrapper-->
    
            </div>
        </div>
    </section>
@include("site/MasterLayout/thongtin")