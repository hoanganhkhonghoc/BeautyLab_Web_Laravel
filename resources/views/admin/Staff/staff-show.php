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
                <form action="index.php?c=staff&a=xl_edit&id=<?php echo $data['staff']['id']; ?>&email=<?php echo $data['staff']['email']; ?>&phone=<?php echo $data['staff']['phone']; ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" name="name" value="<?php echo $data['staff']['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?php echo $data['staff']['email']; ?>" <?php echo isset($_SESSION['err_email']) ? "style='border: 2px solid red;'" : ''; ?>>
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
                                <input type="text" name="phone" value="<?php echo $data['staff']['phone']; ?>" <?php echo isset($_SESSION['err_phone']) ? "style='border: 2px solid red;'" : ''; ?>>
                                <span style="color:red;font-size:15px;"><?php echo isset($_SESSION['err_phone']) ? 'Số điện thoại đã tồn tại' : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label>Cơ sở</label>
                                <select class="select slchon288x40" name="sex" value="<?php echo $data['staff']['facilites_id']; ?>">
                                    <?php foreach ($data['fac'] as $fac) { ?>
                                        <option value="<?php echo $fac['id']; ?>" <?php if ($data['staff']['facilites_id'] == $fac['id']) { {
                                                                                            echo 'selected';
                                                                                        }
                                                                                    } ?>><?php echo $fac['name']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <div class="pass-group ">
                                    <input type="text" class=" pass-inputs" name="address" value="<?php echo $data['staff']['address']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit" name="submit">Cập nhật</button>
                            <a href="index.php?c=staff&a=index" class="btn btn-cancel">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>