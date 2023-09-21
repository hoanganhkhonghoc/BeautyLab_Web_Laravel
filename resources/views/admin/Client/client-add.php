<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thêm khách hàng mới</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="index.php?c=client&a=xl_add" method="post">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" name="name" required value="<?php echo isset($_SESSION['xl_name']) ? $_SESSION['xl_name'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" required value="<?php echo isset($_SESSION['xl_email']) ? $_SESSION['xl_email'] : ''; ?>" <?php echo isset($_SESSION['err_email']) ? "style='border: 2px solid red;'" : ''; ?>>
                                <span style="color:red;font-size:15px;"><?php echo isset($_SESSION['err_email']) ? 'Email đã tồn tại' : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="select  slchon288x40" name="sex" required value="<?php echo isset($_SESSION['xl_sex']) ? $_SESSION['xl_sex'] : ''; ?>">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" name="phone" required value="<?php echo isset($_SESSION['xl_phone']) ? $_SESSION['xl_phone'] : ''; ?>" <?php echo isset($_SESSION['err_phone']) ? "style='border: 2px solid red;'" : ''; ?>>
                                <span style="color:red;font-size:15px;"><?php echo isset($_SESSION['err_phone']) ? 'Số điện thoại đã tồn tại' : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" required value="<?php echo isset($_SESSION['xl_address']) ? $_SESSION['xl_address'] : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <div class="pass-group">
                                    <input type="password" name="pass" class=" pass-input" required>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <div class="pass-group">
                                    <input type="password" name="pass1" class=" pass-inputs" required <?php echo isset($_SESSION['err_pass']) ? "style='border: 2px solid red;'" : ''; ?>>
                                    <span class="fas toggle-passworda fa-eye-slash"></span>
                                    <span style="color:red;font-size:15px;"><?php echo isset($_SESSION['err_pass']) ? 'Sai mật khẩu' : ''; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="submit" class="btn btn-submit me-2">Tạo mới</button>
                            <a href="index.php?c=client&a=index" class="btn btn-cancel">Huỷ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>