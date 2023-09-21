@include('site/MasterLayout/tieude')
<section class="booking-section v2">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-4 col-lg-9 offset-lg-3">
                <div class="section-title text-center">
                    <br>
                    <h3 class="color-ff fw-500">Đăng nhập ngay</h3>
                </div>

                <div class="booking-wrapper mt-45">
                    <form action="/login/xl_login" method="post" class="clearfix">
                        @csrf
                        <div class="login_home email">
                            <input type="email" name="email" placeholder="Email" required value="" />
                        </div>

                        <div class="login_home pass">
                            <input type="password" name="password" placeholder="Mật khẩu" required  />
                        </div>

                        <div class="login_home error">
                            <span></span>
                        </div>

                        <div class="login_home regis">
                            Bạn chưa có tài khoản ??
                            <a href="index.php?c=index&a=register">Đăng ký ngay</a>
                        </div>

                        <br><br>
                        <button type="submit" name="submit">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include("site/MasterLayout/thongtin")