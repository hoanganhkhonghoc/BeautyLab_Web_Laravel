<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thông tin tài khoản</h4>
                <h6>Kiểm tra kĩ thông tin</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="index.php?c=index&a=xl_edit&id=<?php echo $data['account']['id']; ?>&email=<?php echo $data['account']['email']; ?>&phone=<?php echo $data['account']['phone']; ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" name="name" value="<?php echo $data['account']['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?php echo $data['account']['email']; ?>" <?php echo isset($_SESSION['err_email']) ? "style='border: 2px solid red;'" : ''; ?>>
                                <span style="color:red;font-size:15px;"><?php echo isset($_SESSION['err_email']) ? 'Email đã tồn tại' : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-input" name="pass" placeholder="Không thể hiển thị vì lý do bảo mật !! ">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" value="<?php echo $data['account']['phone']; ?>" <?php echo isset($_SESSION['err_phone']) ? "style='border: 2px solid red;'" : ''; ?>>
                                <span style="color:red;font-size:15px;"><?php echo isset($_SESSION['err_phone']) ? 'Số điện thoại đã tồn tại' : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="select slchon288x40" name="sex" value="<?php echo $data['account']['sex']; ?>">
                                    <option value=1 <?php if ($data['account']['sex'] == 1) {
                                                        echo 'selected';
                                                    } ?>>Nam</option>
                                    <option value=2 <?php if ($data['account']['sex'] == 2) {
                                                        echo 'selected';
                                                    } ?>>Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <div class="pass-group ">
                                    <input type="text" class=" pass-inputs" name="address" value="<?php echo $data['account']['address']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit" name="submit">Cập nhật</button>
                            <a href="index.php?c=index&a=index" class="btn btn-cancel">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>