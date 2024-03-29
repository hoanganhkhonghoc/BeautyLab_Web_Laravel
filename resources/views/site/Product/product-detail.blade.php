@include('site/MasterLayout/tieude')
<!-- ======================================= 
        ==Start banner section== 
    =======================================-->
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
                    <li class="active">Chi tiết sản phẩm</li>
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
                                <img src="{{asset("img/". $data['product']->img)}}" alt="product-img" class="img-fluid">
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
                        <h6 class="procuct-title color-d5 fw-700 text-uppercase pb-15">{{$data['product']->namePro}}</h6>
                        <ul class="rating">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        <h4 class="price fw-700 color-72 pt-20 pb-10">{{number_format($data['product']->price) . "VNĐ"}}</h4>
                        <p class="details-txt color-51">{{'Sản phẩm còn ' . number_format($data['product']->quanity) . ' sp'}}</p>
                        <ul class="add-cart-area pb-35">
                            <li class="qty">
                            <form action="@if(Auth::guard("client")->check())
                                                /site/card/addDetail/{{$data['product']->id}}
                                            @else
                                                /login/showView
                                            @endif" method="post">
                                    @csrf
                                    <span class="text-uppercase color-51 fw-500 roboto mr-10">Số lượng :</span>
                                    <span class="decrese"><i class="fa fa-angle-left"></i></span>
                                    <input type="text" name="qty" id="number" value="1" min="1" readonly>
                                    <span class="increse"><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li>
                                <button type="submit" name="submit" class="addtocart color-ff text-uppercase">Thêm vào giỏ hàng</button>
                            </li>
                            </form>
                            <li>
                                <a href="@if(Auth::guard("client")->check())
                                            /site/like/add/{{$data['product']->id}}
                                        @else
                                            /login/showView
                                        @endif" class="favourit"><i class="fa fa-heart"></i></a>
                            </li>
                        </ul>

                        <div class="product-type ptb-20">
                            <table>
                                <tr class="category">
                                    <td>Danh mục: </td>
                                    <td><a href="/site/category/list/{{$data['product']->cateID}}">{{$data['product']->nameCate}}</a></td>
                                </tr>
                                <tr class="tags">
                                    <td>Từ khoá :</td>
                                    <td><a href="/site/category/list/{{$data['product']->cateID}}">{{$data['product']->nameCate}}</a>,
                                        <a href="/site/product/show/{{$data['product']->id}}">{{$data['product']->namePro}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ID:</td>
                                    <td>{{$data['product']->id}}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="share-icons pt-30">
                            <ul>
                                <li class="text-uppercase color-d5 mr-10">Chia sẻ:</li>
                                <li><a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/product details content-->

                </div>
                <!--/wrapper-->

                <div class="product-review-tab">
                    <nav>
                        <div class="nav nav-tabs" role="tablist">
                            <a class="active" data-toggle="tab" href="#desription" role="tab" aria-selected="true">Mô tả sản phẩm</a>
                            <a data-toggle="tab" href="#review" role="tab" aria-selected="false">Bình luận <span><?php //echo '(' . $data['totalComment'] . ')'; ?></span></a>
                        </div>
                    </nav>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="desription" role="tabpanel">
                            <h6 class="fw-700 color-d5 text-uppercase">Mô tả chi tiết sản phẩm</h6>
                            <p>{{$data['product']->detail}}</p>
                        </div>

                        <div class="tab-pane fade" id="review" role="tabpanel">
                            <div class="review">
                                @foreach($data['comment'] as $comment)
                                    <div class="single-review pos-relative">
                                        <img src="{{asset('img/avatar.png')}}" alt="reviewar img" class="author-img">
                                        <ul class="author-name display-inline ptb-5">
                                            <li class="name">{{$comment['name']}}</li>
                                            <li class="date">{{$comment['date']}}</li>
                                        </ul>
                                        <p class="comment">{{$comment["content"]}}</p>
                                    </div>
                                @endforeach
                                <!--/single review-->

                                <div class="review-form pt-20">
                                    {{-- <h6 class="fw-600 color-d5 text-uppercase">leave a review</h6>
                                     <p class="rating-o pb-25">
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                     </p> --}}
                                    @if(Auth::guard("client")->check())
                                        <form action="/site/comment/add/{{$data['product']->id}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <textarea name="msg"></textarea>
                                            </div>
                                            <button type="submit" name="submit">Gửi bình luận</button>
                                        </form>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/product review tab-->

                <!---related product-->
                <h6 class="related-product-title text-uppercase color-d5 fw-500">Có thể bạn quan tâm các sản phẩm này</h6>
                <div class="product-gallery-wrapper clearfix" id="product-gallery-v2">
                    <!-- product-1 -->
                    @foreach($data["product3"] as $pro3)
                        <div class="single-product text-center pos-relative">
                            <div class="product-img pos-relative">
                                <img src="{{asset('img/'.$pro3['img'])}}" alt="product" class="img-fluid">
                                <div class="product-hover">
                                    <ul>
                                        <li><a href="
                                            @if(Auth::guard("client")->check())
                                                /site/card/addList/{{$pro3['id']}}/1
                                            @else
                                                /login/showView
                                            @endif
                                            " title="Add to Cart"><i class="fa fa-cart-plus"></i></a></li>
                                        <li><a href="/site/product/show/{{$pro3['id']}}" class="color-ff text-capitalize roboto" data-gall="gallery1" title="Xem chi tiết">Xem chi tiết</a></li>
                                        <li><a href="
                                            @if(Auth::guard("client")->check())
                                                /site/like/add/{{$pro3['id']}}
                                            @else
                                                /login/showView
                                            @endif
                                     " title="Yêu thích sản phẩm"><i class="fa fa-heart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-price">
                                <h6 class="color-72 fw-500">{{number_format($pro3['price']) . "VNĐ"}}</h6>
                                <div class="product-divider"></div>
                                <a href="/site/product/show/{{$pro3['id']}}" class="roboto fw-500">{{$pro3['namePro']}}</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <!--/col-md-9-->

            <div class="col-lg-3">
                <aside class="sidebar order-lg-1">
                    <div class="single-block categorie">
                        <h6 class="text-uppercase fw-700 color-ff">Danh mục</h6>
                        <div class="panel-group" id="accordion">
                            <div class="accordion" id="product-categorie">
                                @foreach($data['category'] as $cate)
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#cat1" aria-expanded="false" aria-controls="cat1" onclick="location.href='/site/catgory/list/{{$cate['id']}}">{{$cate['nameCate']}}</button>
                                        </div>

                                        <div id="cat1" class="collapse" data-parent="#product-categorie">
                                            <div class="card-body">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!--/panel-->
                        </div>
                        <!--/accordion-->
                    </div>
                    <!--/categorie-->
                    <!-- 
                     <div class="single-block price">
                         <h6 class="text-uppercase fw-700 color-ff">Giá</h6>
                         <div id="range" class="mb-20"></div>
                         <p class="price"><span>Tầm giá : </span> VNĐ
                             <span id="minVal"></span> &#8212; VNĐ
                             <span id="maxVal"></span>
                         </p>
                     </div> -->
                    <!--/price filter-->

                    <div class="single-block special-offer pos-relative">
                        <img src="{{asset('site/images/offer.jpg')}}" alt="offer product" class="img-fluid">
                        <div class="offer-text text-center">
                            <p>Quảng cáo<span class="fw-700 roboto text-uppercase">Một chút ưu đãi</span>Dành cho bạn</p>
                            <a href="#" title="Shop Now">Mua ngay</a>
                        </div>
                    </div>
                    <!--/special offer-->

                    <div class="single-block tag">
                        <h6 class="text-uppercase fw-700 color-ff">Tìm kiếm</h6>
                        <ul class="pt-15">
                            <li><a href="#">Nước hoa</a></li>
                            <li><a href="#">Tinh dầu</a></li>
                            <li><a href="#">Dưỡng thể</a></li>
                        </ul>
                    </div>
                    <!--/tags-->
                </aside>
            </div>
            <!--/sidebar-->

        </div>
    </div>
</section>
<!-- ======================================= 
        ==End Product gallery section== 
    =======================================-->
    @include("site/MasterLayout/thongtin")