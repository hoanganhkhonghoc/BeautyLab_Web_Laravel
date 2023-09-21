<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thêm chi tiết sản phẩm mới</h4>
                <h6>Thêm đủ các thông tin sản phẩm cần</h6>
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
                    <form action="index.php?c=product_detail&a=xl_add&id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-3 col-sm-6 col-12 khung2">
                            <div class="form-group chon288x40">
                                <label>Màu sản phẩm</label>
                                <select class="select slchon288x40" name="color">
                                    <option value="Đỏ">Đỏ</option>
                                    <option value="Trắng">Trắng</option>
                                    <option value="Đen">Đen</option>
                                    <option value="Tím">Tím</option>
                                    <option value="Xanh dương">Xanh dương</option>
                                    <option value="Xanh lá">Xanh lá</option>
                                    <option value="Vàng">Vàng</option>
                                    <option value="Cam">Cam</option>
                                    <option value="Hồng">Hồng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 khung3">
                            <div class="form-group ">
                                <label>Số lượng sản phẩm</label>
                                <input type="number" name="quanity" class="slchon288x40" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea class="form-control" name="detail" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Giá chi tiết</label>
                                <input type="number" class="slchon288x40" name="price" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 khung4">
                            <div class="form-group">
                                <label>Tình trạng hàng</label>
                                <select class="select slchon288x40" name="isSoid">
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
                                    <input type="file" required accept="image/*" name="imgPro">
                                    <div class="image-uploads">
                                        <img src="public/admin/icon/upload.svg" alt="img">
                                        <h4>Chọn đúng hình ảnh</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="submit" class="btn btn-submit me-2">Thêm</button>
                            <a href="index.php?c=product_detail&a=index&id=<?php echo $data['product']['id']; ?>" class="btn btn-cancel">Huỷ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>