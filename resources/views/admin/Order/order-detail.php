<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thông tin</h4>
                <h6>Thông tin đơn hàng</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                </div>

                <div class="card mb-0" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tongdon = 0; ?>
                            <?php foreach($data['product'] AS $pro){ ?>
                                <tr>
                                    <td><?php echo $pro['id']; ?></td>
                                    <td class="productimgname">
                                        <a href="#" class="product-img">
                                            <img src="public/uploads/<?php echo $pro['img']; ?>" alt="product">
                                        </a>
                                        <a href="#"><?php echo $pro['namePro'] . '('. $pro['color'] . ')'; ?></a>
                                    </td>
                                    <td><?php echo number_format($pro['price']) . ' VNĐ'; ?></td>
                                    <td><?php echo $pro['quanity']; ?></td>
                                    <?php $tongtiensanpham = $pro['price'] * $pro['quanity'];  ?>
                                    <td><?php echo number_format($tongtiensanpham) . ' VNĐ'; ?></td>
                                    <?php $tongdon += $tongtiensanpham ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="thongtindonhang">
            <table width="100%">
                <tr>
                    <td colspan="2" style="text-align:center">Thông tin đơn hàng</td>
                    <td colspan="2" style="text-align:center">Thông tin người nhận</td>
                </tr>
                <tr>
                    <td>Tổng tiền sản phẩm: </td>
                    <td><?php echo number_format($tongdon) . ' VNĐ'; ?></td>
                    <td style="color:red; font-weight:bold">Tên người nhận: </td>
                    <td><?php echo $data['receiver']['name']; ?></td>
                </tr>
                <tr>
                    <td>Mã giảm giá được áp dụng: </td>
                    <td><?php echo number_format($data['order']['sum_total'] - $tongdon - 30000) . ' VNĐ'; ?></td>
                    <td style="color:red; font-weight:bold">Số điện thoại người nhận: </td>
                    <td><?php echo '0'. $data['receiver']['phone'] ?></td>
                </tr>
                <tr>
                    <td>Chi phí vận chuyển: </td>
                    <td><?php echo number_format(30000) . ' VNĐ'; ?></td>
                    <td style="color:red; font-weight:bold">Địa chỉ giao hàng: </td>
                    <td><?php echo $data['receiver']['address']; ?></td>
                </tr>
                <tr>
                    <td>Tổng đơn: </td>
                    <td><?php echo number_format($data['order']['sum_total']) . ' VNĐ'; ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Hình thức vận chuyển: </td>
                    <td><?php echo $data['pay']['namePay']; ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Trạng thái đơn hàng: </td>
                    <td><?php switch($data['order']['status']){
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
                    } ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <form method="post" action="index.php?c=order&a=xl_donhang&id=<?php echo $data['order']['id']; ?>">
                <tr>
                    <td>Thay đổi trạng thái</td>
                    <td><select name="status">
                        <?php if($data['order']['status'] == 1 || $data['order']['status'] < 2){ ?>
                            <option value="0" <?php if($data['order']['status'] == 0){ echo 'selected'; } ?>>Huỷ đơn</option>
                        <?php } ?>
                        <?php if($data['order']['status'] != 0 && $data['order']['status'] == 1){ ?>
                            <option value="1" <?php if($data['order']['status'] == 1){ echo 'selected'; } ?>>Chờ xử lý</option>
                        <?php } ?>
                        <?php if($data['order']['status'] == 1 || $data['order']['status'] == 2){ ?>
                            <option value="2" <?php if($data['order']['status'] == 2){ echo 'selected'; } ?>>Đang giao hàng</option>
                        <?php } ?>
                        <?php if($data['order']['status'] == 1 || $data['order']['status'] == 2){ ?>
                            <option value="3" <?php if($data['order']['status'] == 3){ echo 'selected'; } ?>>Giao thành công</option>
                        <?php } ?>
                    </select></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="text-align: center;">
                    <?php if($data['order']['status'] == 0 || $data['order']['status'] == 3){ ?>
                    <?php }else{ ?>
                        <td colspan="4"><button type="submit" name="submit" style="border-radius: 10px; background-color:white; padding:5px;">Cập nhật</button></td>
                    <?php } ?>
                </tr>
                </form>
            </table>
        </div>
    </div>
</div>