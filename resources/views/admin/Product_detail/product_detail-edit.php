<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sửa chi tiết sản phẩm mới</h4>
                <h6>Sửa đủ các thông tin sản phẩm cần</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Tên sản phẩm (Không cần thay đổi)</label>
                            <input type="text" value="<?php echo $data['product']['namePro']; ?>">
                        </div>
                    </div>
                    <form action="index.php?c=product_detail&a=xl_edit&id=<?php echo $data['product_detail']['id'] ?>&idLis=<?php echo $data['product']['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-3 col-sm-6 col-12 khung2">
                            <div class="form-group chon288x40">
                                <label>Màu sản phẩm</label>
                                <select class="select slchon288x40" name="color" value="<?php echo $data['product_detail']['color']; ?>">
                                    <option value="Đỏ" <?php if ($data['product_detail']['color'] == 'Đỏ') {
                                                            echo 'selected';
                                                        } ?>>Đỏ</option>
                                    <option value="Trắng" <?php if ($data['product_detail']['color'] == 'Trắng') {
                                                                echo 'selected';
                                                            } ?>>Trắng</option>
                                    <option value="Đen" <?php if ($data['product_detail']['color'] == 'Đen') {
                                                            echo 'selected';
                                                        } ?>>Đen</option>
                                    <option value="Tím" <?php if ($data['product_detail']['color'] == 'Tím') {
                                                            echo 'selected';
                                                        } ?>>Tím</option>
                                    <option value="Xanh dương" <?php if ($data['product_detail']['color'] == 'Xanh dương') {
                                                                    echo 'selected';
                                                                } ?>>Xanh dương</option>
                                    <option value="Xanh lá" <?php if ($data['product_detail']['color'] == 'Xanh lá') {
                                                                echo 'selected';
                                                            } ?>>Xanh lá</option>
                                    <option value="Vàng" <?php if ($data['product_detail']['color'] == 'Vàng') {
                                                                echo 'selected';
                                                            } ?>>Vàng</option>
                                    <option value="Cam" <?php if ($data['product_detail']['color'] == 'Cam') {
                                                            echo 'selected';
                                                        } ?>>Cam</option>
                                    <option value="Hồng" <?php if ($data['product_detail']['color'] == 'Hồng') {
                                                                echo 'selected';
                                                            } ?>>Hồng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 khung3">
                            <div class="form-group ">
                                <label>Số lượng sản phẩm</label>
                                <input type="number" name="quanity" class="slchon288x40" value="<?php echo $data['product_detail']['quanity']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea class="form-control" name="detail" placeholder="<?php echo $data['product_detail']['detail']; ?>"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Giá chi tiết</label>
                                <input type="number" class="slchon288x40" name="price" value="<?php echo $data['product_detail']['price']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 khung4">
                            <div class="form-group">
                                <label>Tình trạng hàng</label>
                                <select class="select slchon288x40" name="isSoid" value="<?php echo $data['product_detail']['isSoid']; ?>">
                                    <option value=1>Còn</option>
                                    <option value=2>Sắp hết</option>
                                    <option value=0>Hết</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Hình ảnh sản phẩm</label>
                                <div class="image-upload">
                                    <input type="file" accept="image/*" name="imgPro" value="<?php echo $data['product_detail']['img']; ?>">
                                    <div class="image-uploads">
                                        <img src="public/admin/icon/upload.svg" alt="img">
                                        <h4>Chọn đúng hình ảnh</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="product-list">
                                <ul class="row">
                                    <li>
                                        <div class="productviews">
                                            <div class="productviewsimg">
                                                <img src="public/uploads/<?php echo $data['product_detail']['img']; ?>" alt="img">
                                            </div>
                                            <div class="productviewscontent">
                                                <div class="productviewsname">
                                                    <h2><?php echo $data['product_detail']['img']; ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" name="submit" class="btn btn-submit me-2">Sửa</button>
                    <a href="index.php?c=product_detail&a=index&id=<?php echo $data['product']['id']; ?>" class="btn btn-cancel">Huỷ</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>