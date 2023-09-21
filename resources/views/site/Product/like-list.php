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
                     <li><a href="index.php?c=index&a=index">Trang chủ</a></li>
                     <li class="active"><a href="index.php?c=product&a=showAll" style="color:white">Cửa hàng ( sản phẩm )</a></li>
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
                         <form action="#" class="form-inline">
                             <select class="form-control wide" name="beauty-service" required>
                                 <option selected>Danh mục</option>
                                 <?php foreach ($data['category'] as $cate) { ?>
                                     <option value="<?php echo $cate['id']; ?>"><?php echo $cate['nameCate']; ?></option>
                                 <?php } ?>
                             </select>
                             <div class="form-group search-wrapper">
                                 <input type="email" class="form-control" placeholder="Search here">
                                 <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                             </div>
                         </form>
                     </div>

                     <div class="favouritCart">
                         <ul>
                             <li><a href="<?php if (isset($_SESSION['account']['id'])) {
                                                if ($_SESSION['account']['level'] < 3) {
                                                    die();
                                                } else {
                                                    echo 'index.php?c=product&a=like_list&id=' . $_SESSION['account']['id'];
                                                }
                                            } else {
                                                echo 'index.php?c=index&a=login';
                                            } ?>"><i class="fa fa-heart-o"></i></a></li>
                             <li class="pos-relative"><a href="<?php if (isset($_SESSION['account']['id'])) {
                                                                    echo 'index.php?c=card&a=list';
                                                                } else {
                                                                    echo 'index.php?c=index&a=login';
                                                                } ?>"><i class="fa fa-cart-plus"></i><span><?php echo number_format($data['slCard']); ?></span></a></li>
                         </ul>
                     </div>
                 </div>
                 <!--/filtering wrapper-->
             </div>
         </div>
         <!--/row-->

         <div class="row product-gallery-wrapper" id="product-gallery-v1">
             <?php foreach ($data['product'] as $pro) { ?>
                 <!-- product-1 -->
                 <div class="col-lg-3 col-md-4 mason">
                     <div class="single-product text-center pos-relative">
                         <div class="product-img pos-relative">
                             <img src="public/uploads/<?php echo $pro['img']; ?>" alt="product" class="img-fluid">
                             <div class="product-hover">
                                 <ul>
                                     <li><a href="<?php if (isset($_SESSION['account']['id'])) {
                                                        echo 'index.php?c=card&a=add&id=' . $pro['id'];
                                                    } else {
                                                        echo 'index.php?c=index&a=login';
                                                    } ?>" title="Thêm vào giỏ hàng"><i class="fa fa-cart-plus"></i></a></li>
                                     <li><a href="index.php?c=product&a=detail&id=<?php echo $pro['id']; ?>" class="color-ff text-capitalize roboto" data-gall="gallery1" title="Retexturing Activator">Xem chi tiết</a></li>
                                     <li><a href="<?php if (isset($_SESSION['account']['id'])) {
                                                        if ($_SESSION['account']['level'] < 3) {
                                                            die('Tài khoản của bạn k được phép vào đây !!');
                                                        } else {
                                                            echo 'index.php?c=product&a=add_like&id=' . $pro['id'];
                                                        }
                                                    } else {
                                                        echo 'index.php?c=index&a=login';
                                                    } ?>" title="Yêu thích sản phảm"><i class="fa fa-heart<?php if (isset($_SESSION['account']['id'])) {
                                                                                                                $i = 0;
                                                                                                                foreach ($data['likePro'] as $lp) {
                                                                                                                    if ($pro['id'] == $lp['product_detail_id']) {
                                                                                                                        $i = 1;
                                                                                                                    }
                                                                                                                }
                                                                                                                switch ($i) {
                                                                                                                    case 1:
                                                                                                                        break;
                                                                                                                    case 0:
                                                                                                                        echo '-o';
                                                                                                                        break;
                                                                                                                }
                                                                                                            } else {
                                                                                                                echo '-o';
                                                                                                            } ?>"></i></a></li>
                                 </ul>
                             </div>
                         </div>
                         <div class="product-price">
                             <h6 class="color-72 fw-500"><?php echo number_format($pro['price']) . ' VNĐ'; ?></h6>
                             <div class="product-divider"></div>
                             <a href="index.php?c=product&a=detail&id=<?php echo $pro['id']; ?>" class="roboto fw-500" title="View Details"><?php echo $pro['namePro']; ?></a>
                         </div>
                     </div>
                 </div>
                 <!--/col-->
             <?php } ?>
             <!--/col-->
         </div>
         <!--/row-->

         <div class="row">
             <div class="col-12">
                 <ul class="pagination pt-20">
                     <li>
                         <?php
                            if ($data['page'] > 1) {
                                $prev = $data['page'] - 1;
                                echo '<a href="index.php?c=product&a=showAll&page=' . $prev . '"><i class="fa fa-angle-left"></i></a>';
                            }
                            ?>
                         <?php
                            for ($i = 1; $i <= $data['totalPage']; $i++) {
                                $link = "index.php?c=product&a=showAll&page=$i";
                                if ($i == $data['page']) {
                                    echo '<a href="" class="current-item" >' . $i . '</a>';
                                } else {
                                    echo '<a href="' . $link . '">'  . $i . '</a>';
                                }
                            }
                            ?>
                         <?php
                            if ($data['page'] < $data['totalPage']) {
                                $next = $data['page'] + 1;
                                echo '<a href="index.php?c=product&a=showAll&page=' . $next . '"><i class="fa fa-angle-right"></i></a>';
                            }
                            ?>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </section>

 <!-- ======================================= 
        ==End Product gallery section== 
    =======================================-->