<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thông tin sản phẩm</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bar-code-view">
                            <?php echo $data['product']['namePro'] . ' ( ' . $data['product_detail']['color'] . ' )'; ?>
                        </div>
                        <div class="productdetails">
                            <ul class="product-bar">
                                <li>
                                    <h4>Tên sản phẩm</h4>
                                    <h6><?php echo $data['product']['namePro']; ?></h6>
                                </li>
                                <li>
                                    <h4>Danh mục sản phẩm</h4>
                                    <h6><?php echo $data['category']['nameCate']; ?></h6>
                                </li>

                                <li>
                                    <h4>Màu sắc</h4>
                                    <h6><?php echo $data['product_detail']['color'] ?></h6>
                                </li>
                                <li>
                                    <h4>Số lượng</h4>
                                    <h6><?php echo number_format($data['product_detail']['quanity']); ?></h6>
                                </li>
                                <li>
                                    <h4>Giá sản phẩm</h4>
                                    <h6><?php echo number_format($data['product_detail']['price']) . ' VNĐ'; ?></h6>
                                </li>


                                <li>
                                    <h4>Tình trạng</h4>
                                    <h6><?php switch ($data['product_detail']['isSoid']) {
                                            case 1:
                                                echo 'Còn hàng';
                                                break;
                                            case 2:
                                                echo 'Sắp hết';
                                                break;
                                            case 0:
                                                echo 'Hết hàng';
                                                break;
                                        } ?></h6>
                                </li>
                                <li>
                                    <h4>Mô tả chi tiết</h4>
                                    <h6><?php echo $data['product_detail']['detail']; ?></h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="slider-product-details">
                            <div class="owl-carousel owl-theme product-slide">
                                <div class="slider-product">
                                    <img src="public/uploads/<?php echo $data['product_detail']['img']; ?>" alt="img">
                                    <h4><?php echo $data['product_detail']['img']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>