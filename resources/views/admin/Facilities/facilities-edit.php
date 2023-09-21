<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sửa cơ sở</h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="index.php?c=facilities&a=xl_edit&id=<?php echo $data['fac']['id']; ?>" method="post">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Cơ sở</label>
                                <input type="text" name="name" required value="<?php echo $data['fac']['name']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" required value="<?php echo $data['fac']['address']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit" name="submit">Sửa cơ sở</button>
                            <a href="index.php?c=facilities&a=index" class="btn btn-cancel">Trở lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>