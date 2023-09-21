<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thêm loại sản phẩm</h4>
                <h6>Thêm mã sản phẩm này</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="index.php?c=product&a=xl_add" method="POST">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="select" name="cate">
                                    <?php foreach ($data['category'] as $cate) { ?>
                                        <option value="<?php echo $cate['id']; ?>"><?php echo $cate['nameCate']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="select slchon288x40" name="isDeleted">
                                    <option value=1>Mở bán</option>
                                    <option value=0>Hết hàng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" name="submit">Thêm</button>
                            <a href="index.php?c=product&a=add" class="btn btn-cancel">Huỷ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>