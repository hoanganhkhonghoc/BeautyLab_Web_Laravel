<!-- ======================================= 
        ==start cart section==  
    =======================================-->
<section class="beauty-thankyou">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1 class="entry-title">Thông tin đơn hàng</h1>
                </header>

                <div class="entry-content">
                    <div class="woocommerce">
                        <div class="woocommerce-order">
                            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Cảm ơn bạn đã tin tưởng Beauty Lab chúng tôi.</p>

                            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                                <li class="woocommerce-order-overview__order order">
                                    ID đơn hàng: <strong><?php echo $data['order']['id']; ?></strong>
                                </li>
                                <li class="woocommerce-order-overview__date date" width="100px">
                                    Ngày đặt hàng: <strong><?php echo $data['order']['date_order']; ?></strong>
                                </li>
                                <li class="woocommerce-order-overview__total total">Tổng tiền:
                                    <strong>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($data['order']['sum_total']) . 'VNĐ'; ?>
                                            </bdi>
                                        </span>
                                    </strong>
                                </li>
                                <li class="woocommerce-order-overview__payment-method method">
                                    Phương thức thanh toán: <strong><?php echo $data['pay']['namePay']; ?></strong>
                                </li>
                                <li class="woocommerce-order-overview__payment-method method">
                                    Trạng thái đơn hàng: <strong><?php switch ($data['order']['status']) {
                                                                        case 0:
                                                                            echo 'Đơn hàng đã huỷ';
                                                                            break;
                                                                        case 1:
                                                                            echo 'Đang chờ xử lý đơn';
                                                                            break;
                                                                        case 2:
                                                                            echo 'Đơn hàng đang giao';
                                                                            break;
                                                                        case 3:
                                                                            echo 'Đã giao hàng thành công';
                                                                            break;
                                                                    } ?></strong>
                                </li>
                            </ul>

                            <section class="woocommerce-order-details">
                                <h2 class="woocommerce-order-details__title">Thông tin sản phẩm</h2>
                                <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                    <thead>
                                        <tr>
                                            <th class="woocommerce-table__product-name product-name" style="text-align:center">Thông tin</th>
                                            <th class="woocommerce-table__product-table product-total" style="text-align:center">Giá</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $tong = 0;
                                        foreach ($data['product'] as $pro) { ?>
                                            <tr class="woocommerce-table__line-item order_item">
                                                <td class="woocommerce-table__product-name product-name">
                                                    <a href="index.php?c=product&a=detail&id=<?php echo $pro['id']; ?>"><?php echo $pro['namePro'] ?></a>
                                                    <strong class="product-quantity">×&nbsp;<?php echo number_format($pro['quanity']); ?></strong>
                                                </td>

                                                <td class="woocommerce-table__product-total product-total">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>
                                                            <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($pro['price']) . ' x ' . $pro['quanity'] . ' = ' . number_format(($pro['quanity'] * $pro['price'])) . ' VNĐ';
                                                                                                                    $tong += (($pro['quanity'] * $pro['price'])); ?>
                                                        </bdi>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th scope="row">Tổng tiền sản phẩm:</th>
                                            <td>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($tong) . ' VNĐ'; ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Hình thức vận chuyển:</th>
                                            <td><?php echo $data['pay']['namePay']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Giá tiền vận chuyển:</th>
                                            <td>30,000 VNĐ</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mã giảm giá:</th>
                                            <td><?php echo number_format($data['order']['sum_total'] - $tong - 30000) . ' VNĐ'; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tổng đơn:</th>
                                            <td>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($data['order']['sum_total']) . ' VNĐ'; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </section>

                            <section class="woocommerce-customer-details">
                                <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
                                    <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
                                        <h2 class="woocommerce-column__title">Địa chỉ nhận hàng</h2>

                                        <address>
                                            <?php echo 'Tên người nhận: ' . $data['receiver']['name']; ?><br>
                                            <?php echo 'Giới tính: ';
                                            if ($data['receiver']['sex'] == 1) {
                                                echo 'Nam';
                                            } else {
                                                echo 'Nữ';
                                            } ?><br>
                                            <?php echo 'Địa chỉ giao hàng: ' . $data['receiver']['address']; ?><br>
                                            <ion-icon name="call-outline"></ion-icon><?php echo 'SĐT: 0' . $data['receiver']['phone']; ?><br>
                                            <ion-icon name="mail-outline"></ion-icon><?php echo 'Email: ' . $data['client']['email']; ?>
                                        </address>
                                    </div><!-- /.col-1 -->

                                    <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
                                        <h2 class="woocommerce-column__title">Thông tin người đặt hàng</h2>
                                        <address>
                                            <?php echo 'Tên khách hàng: ' . $data['client']['name']; ?><br>
                                            <?php echo 'ID khách hàng: ' . $data['client']['id']; ?><br>
                                            <ion-icon name="mail-outline"></ion-icon><?php echo 'SĐT: 0' . $data['client']['phone']; ?><br>
                                            <ion-icon name="call-outline"></ion-icon><?php echo 'Email: ' . $data['client']['email']; ?><br>
                                            <?php if ($data['order']['status'] < 2 && $data['order']['status'] > 0) { ?>
                                                <div style="width:100%; text-align:center;"><button id="huydonhang" onclick="location.href='index.php?c=order&a=delete&id=<?php echo $data['order']['id']; ?>'">Huỷ đơn</button></div>
                                            <?php } ?>
                                        </address>
                                    </div><!-- /.col-2 -->
                                </section><!-- /.col2-set -->
                            </section>
                            <!-- /.woocommerce-customer-details -->
                        </div>
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