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
 <section class="product-gallery with-sidebar">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="section-title text-center">
                     <h3 class="color-72 fw-500">Danh sách sản phẩm</h3>
                     <p>Tìm thấy <span>{{ "(" . $data["soluong"] . ")"}}</span> sản phẩm có sẵn</p>
                 </div>
             </div>
         </div>
         <!--/row-->

         <div class="row">

             <div class="col-lg-9 order-lg-2">
                 <div class="row">
                     <div class="col-12">
                         <div class="filtering-area pb-30">
                             <div class="view-formate">
                                 <ul>
                                     <li class="active" id="grid-view"><i class="fa fa-th"></i></li>
                                     <li id="list-view"><i class="fa fa-th-list"></i></li>
                                 </ul>
                             </div>

                             <div class="search-product">
                                 <form action="index.php?c=sreach&a=index" method="post" class="form-inline">
                                     <select class="form-control wide" name="beauty-service" required>
                                         <option value="0" selected>Danh mục</option>
                                         @foreach($data["category"] as $cate)
                                             <option value="{{$cate['id']}}">{{$cate['nameCate']}}</option>
                                         @endforeach
                                     </select>
                                     <div class="form-group search-wrapper">
                                         <input type="text" name="key" class="form-control" placeholder="Tìm kiếm tại đây">
                                         <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                     </div>
                                 </form>
                             </div>

                             <div class="favouritCart">
                                 <ul>
                                     <li><a href="@if(Auth::guard("client")->check())
                                        /site/like/product/{{Auth::guard("client")->user()->id}}
                                    @else
                                        /login/showView
                                    @endif"><i class="fa fa-heart-o"></i></a></li>
                                     <li class="pos-relative"><a href="
                                                                        @if(Auth::guard("client")->check())
                                                                            /site/card/show
                                                                        @else
                                                                            /login/showView
                                                                        @endif
                                                                    "><i class="fa fa-cart-plus"></i><span>{{$data["countCart"]}}</span></a></li>
                                 </ul>
                             </div>
                         </div>
                         <!--/filtering wrapper-->
                     </div>
                 </div>
                 <!--/row-->

                 <div class="row">
                     <div class="col-12">
                         <div class="product-gallery-wrapper clearfix" id="product-gallery-v2">
                             @foreach($data['product'] as $pro)
                                 <div class="single-product text-center pos-relative">
                                     <div class="product-img pos-relative">
                                         <img src="{{asset("img/" . $pro['img'])}}" alt="product" class="img-fluid">
                                         <div class="product-hover">
                                             <ul>
                                                 <li><a href="
                                                    @if(Auth::guard("client")->check())
                                                        /site/card/addList/{{$pro['id']}}/1
                                                    @else
                                                        /login/showView
                                                    @endif
                                                    " title="Add to Cart"><i class="fa fa-cart-plus"></i></a></li>
                                                 <li><a href="/site/product/show/{{$pro['id']}}" class="color-ff text-capitalize roboto" data-gall="gallery1" title="Xem chi tiết">Xem chi tiết</a></li>
                                                 <li><a href="
                                                        @if(Auth::guard("client")->check())
                                                            /site/like/add/{{$pro['id']}}
                                                        @else
                                                            /login/showView
                                                        @endif
                                                 " title="Yêu thích sản phẩm"><i class="fa fa-heart"></i></a></li>
                                             </ul>
                                         </div>
                                     </div>
                                     <div class="product-price">
                                         <a href="/site/product/show/{{$pro['id']}}" class="readmore fw-500 color-51 roboto" title="Xem chi tiết">Xem chi tiết</a>
                                         <h6 class="color-72 fw-500">{{number_format($pro['price']) . "VNĐ"}}</h6>
                                         <p class="short-discription"></p>
                                         <div class="product-divider"></div>
                                         <a href="/site/product/show/{{$pro['id']}}" class="roboto fw-500">{{$pro["namePro"]}}</a>
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                         <!--/wrapper-->
                     </div>
                     <!--/col-->
                 </div>
                 <!--/row-->

                 <!--pagination-->
                 <div class="row">
                     <div class="col-12">
                         <ul class="pagination pt-20">
                             <li>
                                    @if($data['product']->currentPage() > 1)
                                        <a href="{{ $data['product']->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>';
                                    @endif

                                    <a class="current-item" href="{{$data['product']->url($data['product']->currentPage())}}">{{$data["product"]->currentPage()}}</a>
                                    
                                    @if($data['product']->currentPage() < $data['product']->lastPage())
                                        <a href="{{ $data['product']->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
                                    @endif
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!--/col-md-9-->

             <div class="col-lg-3">
                 <aside class="sidebar order-lg-1">
                     <div class="single-block categorie">
                         <h6 class="text-uppercase fw-700 color-ff" onclick="location.href='index.php?c=product&a=showAll'">Danh mục</h6>
                         <div class="panel-group" id="accordion">
                             <div class="accordion" id="product-categorie">
                                 @foreach($data["category"] as $cate)
                                     <div class="card">
                                         <div class="card-header">
                                             <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#cat1" aria-expanded="false" aria-controls="cat1" onclick="location.href='/site/category/list/{{$cate['id']}}'">{{$cate['nameCate']}} <span></span></button>
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