@include('site/MasterLayout/tieude')
<!-- ======================================= 
        ==start cart section==  
    =======================================-->
<section class="beauty-cart">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1 class="entry-title">Lịch sử đơn hàng</h1>
                </header>

                <div class="entry-content">
                    <div class="woocommerce">
                        <div class="woocommerce-notices-wrapper"></div>
                        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-name">ID Đơn hàng</th>
                                    <th class="product-price">Giá tiền</th>
                                    <th class="product-quantity">Ngày đặt</th>
                                    <th class="product-quantity">Trạng thái đơn hàng</th>
                                    <th class="product-subtotal">Thông tin chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['order'] as $order)
                                    <tr class="woocommerce-cart-form__cart-item cart_item">

                                        <td class="product-name" data-title="Product" style="text-align:center">
                                            <a href="#">{{$order['id']}}</a>
                                        </td>

                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">&nbsp;</span>{{ number_format($order['sum']) . ' VNĐ' }}
                                                </bdi>
                                            </span>
                                        </td>

                                        <td class="product-subtotal" data-title="Subtotal">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">&nbsp;</span><?php $newDate = date("d/m/Y", strtotime($order['date_order'])); echo $newDate; ?>
                                                </bdi>
                                            </span>
                                        </td>

                                        <td class="product-price" data-title="Price">
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span class="woocommerce-Price-currencySymbol">&nbsp;</span><?php switch($order['status']){
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
                                                    } ?>
                                                </bdi>
                                            </span>
                                        </td>

                                        <td class="product-remove">
                                            <button style="background: rgba(213, 39, 90, 0.8); width: 80px;height: 40px;color: #fff!important;font-size: 22px;border-radius: 10px;padding: 2px 7px;display: block; margin: 0 auto;font-weight: 400;"
                                            onclick="location.href='/site/order/show/{{$order['id']}}'">Xem</button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- /.woocommerce-cart-form -->

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