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
                     <li class="active">Sản phẩm yêu thích</li>
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
 <section class="product-gallery">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="section-title text-center">
                     <h3 class="color-72 fw-500">Danh sách sản phẩm đã thích</h3>
                     <p>Hãy lựa chọn thật kĩ sản phẩm mà bạn muốn mua, hãy nhớ bạn có thể liên hệ cho chúng tôi để được tư vấn</p>
                 </div>
             </div>
         </div>
         <!--/row-->

         <div class="row">
             <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                 <div class="filtering-area">
                     <div class="search-product">
                         <form action="/site/search" class="form-inline">
                            @csrf
                             <select class="form-control wide" name="beauty-service" required>
                                 <option selected>Danh mục</option>
                                 @foreach($data['category'] as $cate)
                                     <option value="{{$cate['id']}}">{{$cate['nameCate']}}</option>
                                 @endforeach
                             </select>
                             <div class="form-group search-wrapper">
                                 <input type="email" class="form-control" placeholder="Search here">
                                 <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                             </div>
                         </form>
                     </div>

                     <div class="favouritCart">
                         <ul>
                             <li><a href="/site/like/product/{{Auth::guard("client")->user()->id}}"><i class="fa fa-heart-o"></i></a></li>
                             <li class="pos-relative"><a href="/site/card/show"><i class="fa fa-cart-plus"></i><span><?php //echo number_format($data['slCard']); ?></span></a></li>
                         </ul>
                     </div>
                 </div>
                 <!--/filtering wrapper-->
             </div>
         </div>
         <!--/row-->

         <div class="row product-gallery-wrapper" id="product-gallery-v1">
             @foreach($data['product'] as $pro)
                 <!-- product-1 -->
                 <div class="col-lg-3 col-md-4 mason">
                     <div class="single-product text-center pos-relative">
                         <div class="product-img pos-relative">
                             <img src="{{asset('img/'.$pro['img'])}}" alt="product" class="img-fluid">
                             <div class="product-hover">
                                 <ul>
                                     <li><a href="
                                        @if(Auth::guard("client")->check())
                                            /site/card/addList/{{$pro['id']}}/1
                                        @else
                                            /login/showView
                                        @endif
                                        " title="Thêm vào giỏ hàng"><i class="fa fa-cart-plus"></i></a></li>
                                     <li><a href="/site/product/show/{{$pro['id']}}" class="color-ff text-capitalize roboto" data-gall="gallery1" title="Retexturing Activator">Xem chi tiết</a></li>
                                     <li><a href="/site/like/add/{{$pro['id']}}" title="Yêu thích sản phảm"><i class="fa fa-heart"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                         <div class="product-price">
                             <h6 class="color-72 fw-500">{{number_format($pro['price']) . "VNĐ"}}</h6>
                             <div class="product-divider"></div>
                             <a href="/site/product/show/{{$pro['id']}}" class="roboto fw-500" title="View Details">{{$pro["namePro"]}}</a>
                         </div>
                     </div>
                 </div>
                 <!--/col-->
             @endforeach
             <!--/col-->
         </div>
         <!--/row-->

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
 </section>

 <!-- ======================================= 
        ==End Product gallery section== 
    =======================================-->
    @include("site/MasterLayout/thongtin")