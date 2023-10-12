@include('site/MasterLayout/tieude')
<!-- ======================================= 
        ==start cart section==  
    =======================================-->
    <section class="beauty-cart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Giỏ hàng</h1>
                    </header>

                    <div class="entry-content">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <form class="woocommerce-cart-form" action="/site/card/updateCart/{{$data["Idcart"]->id}}" method="post">
                                @csrf
                                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php $sumAllProductInCart = 0; ?>
                                        @foreach($data['cart'] as $cart)
                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                <td class="product-remove">
                                                    <a href="/site/card/deleted/{{$cart['product_id']}}/{{$cart["cart_id"]}}" class="remove" aria-label="Remove this item" data-product_id="26" data-product_sku="woo-single">×</a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="#">
                                                        <img width="300" height="300" src="{{asset("img/" . $cart['img'])}}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="">
                                                    </a>
                                                </td>

                                                <td class="product-name" data-title="Product">
                                                    <a href="/site/product/show/{{$cart["product_id"]}}">{{$cart['namePro'] . " (" . $cart['color'] . ")"}}</a>
                                                </td>

                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">&nbsp;</span>{{number_format($cart['price'])}}
                                                        </bdi>
                                                    </span>
                                                </td>

                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity">
                                                        <input type="number" class="input-text qty text" step="1" min="1" max="{{$cart['quanity']}}" name="quanity[{{$cart['product_id']}}]" value="{{$cart['quanity']}}" title="Số lượng" size="4" placeholder="" />
                                                    </div>
                                                </td>

                                                <td class="product-subtotal" data-title="Subtotal">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">&nbsp;</span>{{number_format($cart['quanity'] * $cart['price']) . ' VNĐ'}}
                                                                                                                        <?php $sumAllProductInCart += ($cart['quanity'] * $cart['price']); ?>
                                                        </bdi>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="6" class="actions">
                                                <button type="submit" class="button" name="update_cart" value="Update cart" aria-disabled="true">Cập nhật</button>
                            </form>
                            <form action="index.php?c=discount&a=index" method="post">
                                {{-- <div class="coupon">
                                    <?php //if (!isset($_SESSION['magiamgia'])) { ?>
                                        <label for="coupon_code">Mã giảm giá:</label>
                                        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã giảm giá">
                                        <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Áp dụng mã</button>
                                    <?php //}else{ ?>
                                        <p for="coupon_code">Mã giảm giá đã áp dụng: <?php //echo $_SESSION['checkcodediscount']; ?> &emsp; </p>
                                        <button type="submit" name="unset" class="button" name="apply_coupon">Huỷ mã</button>
                                    <?php //} ?>
                                </div> --}}
                            </form>


                            </td>
                            </tr>
                            </tbody>
                            </table>

                            <!-- /.woocommerce-cart-form -->

                            <div class="cart-collaterals">
                                <div class="cart_totals ">
                                    <h2>Thông tin giỏ hàng</h2>
                                    <table cellspacing="0" class="shop_table shop_table_responsive">

                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>Tổng tiền sản phẩm</th>
                                                <td data-title="Subtotal">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">&nbsp;</span><?php echo number_format($sumAllProductInCart) . ' VNĐ'; ?>
                                                        </bdi>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="cart-subtotal">
                                                <th>Mã giảm giá</th>
                                                <td data-title="Subtotal">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol">&nbsp;</span><?php // 0; ?>
                                                        </bdi>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng tiền</th>
                                                <td data-title="Total">
                                                    <strong>
                                                        <span class="woocommerce-Price-amount amount">
                                                            <bdi>
                                                                <span class="woocommerce-Price-currencySymbol">&nbsp;</span><?php echo number_format($sumAllProductInCart - 0) . ' VNĐ'; ?>
                                                            </bdi>
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div class="wc-proceed-to-checkout">
                                        <a href="/site/order/index/{{Auth::guard("client")->user()->id}}" class="checkout-button button alt wc-forward">
                                            Thanh toán
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- /.cart-collaterals -->

                        </div>
                        <!-- /.woocommerce -->
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
    @include("site/MasterLayout/thongtin")