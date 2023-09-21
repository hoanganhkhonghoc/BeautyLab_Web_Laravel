<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sửa loại sản phẩm</h4>
                <h6>Hãy chú ý các danh mục cần sửa</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="index.php?c=product&a=xl_edit&id=<?php echo $data['product']['id']; ?>" method="POST">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name" required value="<?php echo $data['product']['namePro']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="select slchon288x40" name="cate">
                                    <?php foreach ($data['category'] as $cate) { ?>
                                        <option <?php if ($data['product']['cat_id'] == $cate['id']) echo "selected"; ?> value=<?php echo $cate['id']; ?>>
                                            <?php echo $cate['nameCate']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="select" name="isDeleted">
                                    <option value=1>Mở bán</option>
                                    <option value=0>Hết hàng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" name="submit">Sửa</button>
                            <a href="index.php?c=product&a=index" class="btn btn-cancel">Huỷ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>