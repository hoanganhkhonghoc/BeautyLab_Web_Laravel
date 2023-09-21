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
                                <img src="public/uploads/<?php echo $data['product'][0]['img']; ?>" alt="product-img" class="img-fluid">
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
                        <h6 class="procuct-title color-d5 fw-700 text-uppercase pb-15"><?php echo $data['product'][0]['namePro']; ?></h6>
                        <ul class="rating">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        <h4 class="price fw-700 color-72 pt-20 pb-10"><?php echo number_format($data['product'][0]['price']) . 'VNĐ'; ?></h4>
                        <p class="details-txt color-51"><?php echo 'Sản phẩm còn ' . number_format($data['product'][0]['quanity']) . ' sp'; ?></p>
                        <ul class="add-cart-area pb-35">
                            <li class="qty">
                                <form action="<?php if (isset($_SESSION['account']['id'])) {
                                                    echo 'index.php?c=card&a=add&id=' . $data['product'][0]['id'];
                                                } else {
                                                    echo 'index.php?c=index&a=login';
                                                } ?>" method="post">
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
                                <a href="<?php if (isset($_SESSION['account']['id'])) {
                                                if ($_SESSION['account']['level'] < 3) {
                                                    die('Tài khoản của bạn k được phép vào đây !!');
                                                } else {
                                                    echo 'index.php?c=product&a=add_likeIndetail&id=' . $data['product'][0]['id'];
                                                }
                                            } else {
                                                echo 'index.php?c=index&a=login';
                                            } ?>" class="favourit"><i class="fa fa-heart<?php if ($data['like'] == 1) {
                                                                                        } else {
                                                                                            echo '-o';
                                                                                        } ?>"></i></a>
                            </li>
                        </ul>

                        <div class="product-type ptb-20">
                            <table>
                                <tr class="category">
                                    <td>Danh mục: </td>
                                    <td><a href="index.php?c=product&a=list_cate&id=<?php echo $data['product'][0]['cat_id'] ?>"><?php echo $data['product'][0]['nameCate']; ?></a></td>
                                </tr>
                                <tr class="tags">
                                    <td>Từ khoá :</td>
                                    <td><a href="index.php?c=product&a=list_cate&id=<?php echo $data['product'][0]['cat_id'] ?>"><?php echo $data['product'][0]['nameCate']; ?></a>,
                                        <a href="index.php?c=product&a=detail&id=<?php echo $data['product'][0]['id']; ?>"><?php echo $data['product'][0]['namePro']; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ID:</td>
                                    <td><?php echo $data['product'][0]['id']; ?></td>
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
                            <a data-toggle="tab" href="#review" role="tab" aria-selected="false">Bình luận <span><?php echo '(' . $data['totalComment'] . ')'; ?></span></a>
                        </div>
                    </nav>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="desription" role="tabpanel">
                            <h6 class="fw-700 color-d5 text-uppercase">Mô tả chi tiết sản phẩm</h6>
                            <p><?php echo  $data['product'][0]['detail']; ?></p>
                        </div>

                        <div class="tab-pane fade" id="review" role="tabpanel">
                            <div class="review">
                                <?php foreach ($data['comment'] as $comment) { ?>
                                    <div class="single-review pos-relative">
                                        <img src="public/uploads/no-img.png" alt="reviewar img" class="author-img">
                                        <ul class="author-name display-inline ptb-5">
                                            <li class="name"><?php echo $comment['name']; ?></li>
                                            <li class="date"><?php echo $comment['date']; ?></li>
                                        </ul>
                                        <p class="comment"><?php echo $comment['content']; ?></p>
                                    </div>
                                <?php } ?>
                                <!--/single review-->

                                <div class="review-form pt-20">
                                    <!-- <h6 class="fw-600 color-d5 text-uppercase">leave a review</h6>
                                     <p class="rating-o pb-25">
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                     </p> -->
                                    <?php if (isset($_SESSION['account']['id']) && $_SESSION['account']['level'] > 2) { ?>
                                        <form action="index.php?c=comment&a=index&id=<?php echo $_GET['id']; ?>" method="post">
                                            <div class="form-group">
                                                <textarea name="msg"></textarea>
                                            </div>
                                            <button type="submit" name="submit">Gửi bình luận</button>
                                        </form>
                                    <?php  } ?>
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
                    <?php foreach ($data['product3'] as $pro3) { ?>
                        <div class="single-product text-center pos-relative">
                            <div class="product-img pos-relative">
                                <img src="public/uploads/<?php echo $pro3['img']; ?>" alt="product" class="img-fluid">
                                <div class="product-hover">
                                    <ul>
                                        <li><a href="#" title="Add to Cart"><i class="fa fa-cart-plus"></i></a></li>
                                        <li><a href="index.php?c=product&a=detail&id=<?php echo $pro3['id']; ?>" class="color-ff text-capitalize roboto" data-gall="gallery1" title="Xem chi tiết">Xem chi tiết</a></li>
                                        <li><a href="<?php if (isset($_SESSION['account']['id'])) {
                                                            if ($_SESSION['account']['level'] < 3) {
                                                                die('Tài khoản của bạn k được phép vào đây !!');
                                                            } else {
                                                                echo 'index.php?c=product&a=add_like&id=' . $pro3['id'];
                                                            }
                                                        } else {
                                                            echo 'index.php?c=index&a=login';
                                                        } ?>" title="Yêu thích sản phẩm"><i class="fa fa-heart<?php if (isset($_SESSION['account']['id'])) {
                                                                                                                    $i = 0;
                                                                                                                    foreach ($data['likePro'] as $lp) {
                                                                                                                        if ($pro3['id'] == $lp['product_detail_id']) {
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
                                <h6 class="color-72 fw-500"><?php echo number_format($pro3['price']) . ' VNĐ'; ?></h6>
                                <div class="product-divider"></div>
                                <a href="index.php?c=product&a=detail&id=<?php echo $pro3['id']; ?>" class="roboto fw-500"><?php echo $pro3['namePro']; ?></a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <!--/col-md-9-->

            <div class="col-lg-3">
                <aside class="sidebar order-lg-1">
                    <div class="single-block categorie">
                        <h6 class="text-uppercase fw-700 color-ff">Danh mục</h6>
                        <div class="panel-group" id="accordion">
                            <div class="accordion" id="product-categorie">
                                <?php foreach ($data['category'] as $cate) { ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#cat1" aria-expanded="false" aria-controls="cat1" onclick="location.href='index.php?c=product&a=list_cate&id=<?php echo $cate['id']; ?>'"><?php echo $cate['nameCate']; ?></button>
                                        </div>

                                        <div id="cat1" class="collapse" data-parent="#product-categorie">
                                            <div class="card-body">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

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
                        <img src="public/site/images/offer.jpg" alt="offer product" class="img-fluid">
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