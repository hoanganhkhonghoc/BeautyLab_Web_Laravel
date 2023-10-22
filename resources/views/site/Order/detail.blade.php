@include('site/MasterLayout/tieude')
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
                                    ID đơn hàng: <strong>{{$data[0]->id}}</strong>
                                </li>
                                <li class="woocommerce-order-overview__date date" width="100px">
                                    Ngày đặt hàng: <strong>{{$data[0]->date_order}}</strong>
                                </li>
                                <li class="woocommerce-order-overview__total total">Tổng tiền:
                                    <strong>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol"></span><?php echo number_format($data[0]->sum) . 'VNĐ'; ?>
                                            </bdi>
                                        </span>
                                    </strong>
                                </li>
                                <li class="woocommerce-order-overview__payment-method method">
                                    Phương thức thanh toán: <strong>{{$data[0]['namePay']}}</strong>
                                </li>
                                <li class="woocommerce-order-overview__payment-method method">
                                    Trạng thái đơn hàng: <strong><?php switch ($data[0]->status) {
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
                                        <?php $tong = 0; ?>
                                        @foreach($data as $pro)
                                            <tr class="woocommerce-table__line-item order_item">
                                                <td class="woocommerce-table__product-name product-name">
                                                    <a href="index.php?c=product&a=detail&id=<?php //echo $pro['id']; ?>">{{$pro["namePro"] . "(" . $pro["color"] . ")"}}</a>
                                                    <strong class="product-quantity">×&nbsp;{{number_format($pro['price'])}}</strong>
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
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th scope="row">Tổng tiền sản phẩm:</th>
                                            <td>
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol"></span>{{number_format($tong) . ' VNĐ'}}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Hình thức vận chuyển:</th>
                                            <td>{{$data[0]->namePay}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Giá tiền vận chuyển:</th>
                                            <td>30,000 VNĐ</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mã giảm giá:</th>
                                            <td><?php 
                                                    $giamgia = 0;
                                                    if(Session::has("maGiamGia")){
                                                       $giamgia = $tong + 30000 - $data[0]->sum;
                                                    }
                                                    echo "-" . number_format($giamgia) . " VNĐ";
                                                ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tổng đơn:</th>
                                            <td>
                                                <span class="woocommerce-Price-amount amount"><?php $tong += 30000; ?>
                                                    <span class="woocommerce-Price-currencySymbol"></span>{{number_format($data[0]->sum) . ' VNĐ'}}
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
                                            {{'Tên người nhận: ' . $data[0]->name}}<br>
                                            <?php echo 'Giới tính: ';
                                            if ($data[0]->sex == 1) {
                                                echo 'Nam';
                                            } else {
                                                echo 'Nữ';
                                            } ?><br>
                                            {{'Địa chỉ giao hàng: ' . $data[0]->address}}<br>
                                            <ion-icon name="call-outline"></ion-icon>{{'SĐT: ' . $data[0]->phone}}<br>
                                            <ion-icon name="mail-outline"></ion-icon>{{'Email: ' . Auth::guard("client")->user()->email}}
                                        </address>
                                    </div><!-- /.col-1 -->

                                    <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
                                        <h2 class="woocommerce-column__title">Thông tin người đặt hàng</h2>
                                        <address>
                                            {{'Tên khách hàng: '. Auth::guard("client")->user()->name}}<br>
                                            {{'ID khách hàng: '. Auth::guard("client")->user()->id}}<br>
                                            <ion-icon name="mail-outline"></ion-icon>{{'SĐT: ' . Auth::guard("client")->user()->phone}}<br>
                                            <ion-icon name="call-outline"></ion-icon>{{'Email: ' . Auth::guard("client")->user()->email}}<br>
                                            @if($data[0]->status == 1)
                                                <div style="width:100%; text-align:center;"><button id="huydonhang" onclick="location.href='/site/order/deleted/{{$data[0]->id}}'">Huỷ đơn</button></div>
                                            @endif
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
    @include("site/MasterLayout/thongtin")