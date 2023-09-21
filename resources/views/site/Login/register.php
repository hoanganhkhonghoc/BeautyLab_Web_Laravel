<section class="booking-section v2">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-4 col-lg-9 offset-lg-3">
                <div class="section-title text-center">
                    <br>
                    <h3 class="color-ff fw-500">Đăng ký ngay</h3>
                </div>

                <div class="booking-wrapper mt-45">
                    <form action="index.php?c=index&a=xl_regis" method="post" class="clearfix">

                        <div class="login_home email">
                            <input type="text" name="name" placeholder="Tên chủ tài khoản" value="<?php if (isset($_SESSION['regis_name'])) {
                                                                                                        echo $_SESSION['regis_name'];
                                                                                                    } ?>" required />
                        </div>

                        <div class="login_home email">
                            <input type="email" name="email" placeholder="Email" required <?php if (isset($_SESSION['err_email'])) {
                                                                                                echo "style='border: 2px solid red;'";
                                                                                            } ?> value="<?php if (isset($_SESSION['regis_email'])) {
                                                    echo $_SESSION['regis_email'];
                                                } ?>" />
                        </div>

                        <div class="login_home email">
                            <input type="text" name="phone" placeholder="Số điện thoại" required <?php if (isset($_SESSION['err_phone'])) {
                                                                                                        echo "style='border: 2px solid red;'";
                                                                                                    } ?> value="<?php if (isset($_SESSION['regis_phone'])) {
                                                    echo $_SESSION['regis_phone'];
                                                } ?>" />
                        </div>

                        <div class="single-input beauty-service clearfix">
                            <select class="wide" name="sex" required>
                                <option selected value="<?php if (isset($_SESSION['regis_sex'])) {
                                                            echo $_SESSION['regis_sex'];
                                                        } ?>">Giới tính</option>
                                <option value=1>Nam</option>
                                <option value=2>Nữ</option>
                            </select>
                        </div>

                        <div class="login_home email">
                            <input type="text" name="address" placeholder="Địa chỉ" required value="<?php if (isset($_SESSION['regis_add'])) {
                                                                                                        echo $_SESSION['regis_add'];
                                                                                                    } ?>" />
                        </div>

                        <div class="login_home pass">
                            <input type="password" name="pass" placeholder="Mật khẩu" required />
                        </div>

                        <div class="login_home pass">
                            <input type="password" name="pass1" placeholder="Nhập lại mật khẩu" required <?php if (isset($_SESSION['err_pass'])) {
                                                                                                                echo "style='border: 2px solid red;'";
                                                                                                            } ?> />
                        </div>

                        <div class="login_home error">
                            <span><?php if (isset($_SESSION['err_regis'])) {
                                        echo $_SESSION['err_regis'];
                                    } ?></span>
                        </div>

                        <div class="login_home regis">
                            Bạn đã có tài khoản ??
                            <a href="index.php?c=index&a=login">Đăng nhập ngay</a>
                        </div>

                        <br><br>
                        <button type="submit" name="submit">Đăng Ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>