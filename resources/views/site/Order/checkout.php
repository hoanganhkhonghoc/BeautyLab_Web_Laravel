    <!-- ======================================= 
        ==start cart section==  
    =======================================-->
    <section class="beauty-checkout">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Thanh toán</h1>
                    </header>

                    <div class="entry-content">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="woocommerce-form-coupon-toggle">
                                <div class="woocommerce-info">
                                    <?php if(isset($_SESSION['magiamgia'])){ ?>
                                    Mã giảm giá đã được áp dụng: <?php echo $_SESSION['checkcodediscount']; ?>
                                    <?php }else { ?>
                                    Bạn có mã giảm giá? <a href="#" class="showcoupon">Ấn vô đây để nhập</a>
                                    <?php } ?>
                                </div>
                            </div>

                            <form class="checkout_coupon woocommerce-form-coupon" action="index.php?c=discount&a=index" method="post" style="display:none">
                                <p>Nếu bạn có mã giảm giá hãy nhập đúng mã của mình</p>
                                <p class="form-row form-row-first">
                                    <input type="text" name="coupon_code" class="input-text" placeholder="Nhập ở đây" id="coupon_code" value="">
                                </p>

                                <p class="form-row form-row-last">
                                    <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Áp dụng</button>
                                </p>
                                <div class="clear"></div>
                            </form>

                            <div class="woocommerce-notices-wrapper"></div>

                            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="index.php?c=order&a=add">

                                <div class="col2-set" id="customer_details">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Thông tin</h3>
                                            <div class="woocommerce-billing-fields__field-wrapper">
                                                <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                    <label for="billing_company" class="">Họ và tên người nhận&nbsp;<span class="optional">(Bắt buộc)</span>
                                                    </label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="<?php echo $_SESSION['account']['name']; ?>" value="<?php echo $_SESSION['account']['name']; ?>" autocomplete="organization" required>
                                                    </span>
                                                </p>
                                                <p class="form-row address-field validate-required form-row-wide" id="billing_address_1_field" data-priority="50">
                                                    <label for="billing_address_1" class="">Địa chỉ cụ thể&nbsp;
                                                        <abbr class="required" title="required">*</abbr>
                                                    </label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text" name="billing_address_1" id="billing_address_1" placeholder="<?php echo $_SESSION['account']['address']; ?>" value="<?php echo $_SESSION['account']['address']; ?>" autocomplete="address-line1" required data-placeholder="House number and street name">
                                                    </span>
                                                </p>
                                                <p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                    <label for="billing_phone" class="">Số điện thoại liên hệ&nbsp;
                                                        <abbr class="required" title="required">*</abbr>
                                                    </label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="<?php echo '0'.$_SESSION['account']['phone']; ?>" value="0<?php echo $_SESSION['account']['phone']; ?>" autocomplete="tel" required>
                                                    </span>
                                                </p>
                                                <p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                                                    <label for="billing_email" class="">Địa chỉ email&nbsp;
                                                        <abbr class="required" title="required">*</abbr>
                                                    </label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="email" class="input-text" name="billing_email" id="billing_email" placeholder="<?php echo $_SESSION['account']['email']; ?>" value="<?php echo $_SESSION['account']['email']; ?>" autocomplete="email here" required>
                                                    </span>
                                                </p>
                                            </div>
                                            <!-- /.woocommerce-billing-fields__field-wrapper -->
                                        </div>
                                        <!-- /.woocommerce-billing-fields -->
                                    </div>

                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <h3 id="ship-to-different-address">
                                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                    <!-- <input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" name="ship_to_different_address" value="1"> -->
                                                    <!-- <span>Ship to a different address?</span> -->
                                                </label>
                                            </h3>

                                            <div class="shipping_address" style="display: none;">
                                                <div class="woocommerce-shipping-fields__field-wrapper">
                                                </div>
                                                <!-- /.woocommerce-shipping-fields__field-wrapper -->
                                            </div>
                                            <!-- /.shipping_address -->
                                        </div>

                                        <div class="woocommerce-additional-fields">
                                            <div class="woocommerce-additional-fields__field-wrapper">
                                                <p class="form-row notes" id="order_comments_field" data-priority="">
                                                    <label for="order_comments" class="">Lời nhắn tới cửa hàng&nbsp;
                                                        <span class="optional">(yêu cầu của bạn)</span>
                                                    </label>
                                                    <span class="woocommerce-input-wrapper">
                                                        <textarea name="order_comments" class="input-text" id="order_comments" placeholder="Hãy để lại cho chúng tôi biết được mong muốn của bạn. " rows="2" cols="5"></textarea>
                                                    </span>
                                                </p>
                                            </div>
                                            <!-- /.woocommerce-additional-fields__field-wrapper -->
                                        </div>
                                    </div>
                                    <!--/.col-2 -->
                                </div>
                                <!-- /.col2-set -->

                                <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                                <div id="order_review" class="woocommerce-checkout-review-order">
                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Thông tin sản phẩm</th>
                                                <th class="product-total">Giá tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $giatong = 0;
                                        foreach ($data['product'] as $pro) { ?>
                                            <tr class="cart_item">
                                                <td class="product-name"><?php echo $pro['namePro']; ?>&nbsp; <strong class="product-quantity">×&nbsp;<?php echo $pro['quanity']; ?></strong></td>
                                                <td class="product-total">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol"></span><?php $tt = $pro['price'] * $pro['quanity'];
                                                                                                                        echo number_format($tt) . ' VNĐ';  ?>
                                                        </bdi>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?php $giatong = $giatong + $tt;
                                        } ?>
                                        </tbody>

                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Mã sản phẩm đã được sử dụng</th>
                                                <td>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol"></span><?php $giamgia = 0;
                                                                                                                        if (isset($_SESSION['money'])) {
                                                                                                                            $giamgia = $_SESSION['money'];
                                                                                                                        }
                                                                                                                        if (isset($_SESSION['percent'])) {
                                                                                                                            $giamgia = ($_SESSION['percent'] * $giatong) / 100;
                                                                                                                        }
                                                                                                                        echo number_format($giamgia) . ' VNĐ'; ?>
                                                        </bdi>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Tổng tiền sản phẩm</th>
                                                <td>
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($giatong) . ' VNĐ'; ?>
                                                        </bdi>
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr class="woocommerce-shipping-totals shipping">
                                                <th>Vận chuyển</th>
                                                <td data-title="Shipping">
                                                    <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                        <li>
                                                            <input type="radio" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping1" value="free_shipping:1" class="shipping_method" checked="checked">
                                                            <label for="shipping_method_0_free_shipping1">Đồng giá 30k</label>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Tổng đơn</th>
                                                <td>
                                                    <strong>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                                <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($giatong + 30000 - $giamgia). ' VNĐ'; $_SESSION['giatongdon'] = ($giatong + 30000 - $giamgia); ?>
                                                            </bdi>
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- /.woocommerce-checkout-review-order-table -->

                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <?php foreach($data['pay'] AS $pay){ ?>
                                            <li class="wc_payment_method payment_method_bacs">
                                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="<?php echo $pay['id']; ?>" checked="checked" data-order_button_text="">
                                                <label for="payment_method_bacs"> <?php echo $pay['namePay']; ?></label>
                                                <div class="payment_box payment_method_bacs">
                                                    <!-- <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p> -->
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="form-row place-order">
                                            <div class="woocommerce-terms-and-conditions-wrapper">
                                                <div class="woocommerce-privacy-policy-text">
                                                    <p>
                                                        <!-- <a href="#" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>. -->
                                                    </p>
                                                </div>
                                            </div>

                                            <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Thanh toán</button>

                                            <input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="254c5dd23d">
                                            <input type="hidden" name="_wp_http_referer" value="/01.%20wp-funnel/?wc-ajax=update_order_review">
                                        </div>
                                    </div>
                                    <!-- /.woocommerce-checkout-payment -->
                                </div>
                                <!-- /.woocommerce-checkout-review-order -->

                            </form>
                            <!-- /.woocommerce-checkout -->
                        </div>
                    </div>
                    <!-- /.entry-content -->
                </div>
                <!-- /.col-12 -->
            </div>
        </div>
    </section>
    <!-- ======================================= 
        ==End cart section==  
    =======================================-->