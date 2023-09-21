<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Quản lý đơn hàng</h4>
                <h6>Tất cả đơn hàng</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                </div>

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr style="text-align:center">
                                <th>ID</th>
                                <th>Ngày đặt đơn</th>
                                <th>Trạng thái sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data AS $order){ ?>
                                <tr>
                                    <td><?php echo $order['id']; ?></td>
                                    <td style="text-align:center"><?php echo $order['date_order']; ?></td>
                                    <td style="text-align:center">
                                        <?php if($order['status'] == 3){ ?> 
                                            <span class="badges bg-lightgreen">Đã thanh toán</span>
                                        <?php } ?>
                                        <?php if($order['status'] == 0){ ?> 
                                            <span class="badges bg-lightred">Đã huỷ</span>
                                        <?php } ?>
                                        <?php if($order['status'] == 1){ ?> 
                                            <span class="badges bg-lightyellow">Chờ xử lý</span>
                                        <?php } ?>
                                        <?php if($order['status'] == 2){ ?> 
                                            <span class="badges bg-lightyellow">Đang giao hàng</span>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo number_format($order['sum_total']) . 'VNĐ'; ?></td>
                                    <td>
                                        <a class="me-3" href="index.php?c=order&a=show&id=<?php echo $order['id']; ?>">
                                            <img src="public/admin/icon/edit.svg" alt="img">
                                        </a>
                                        <?php if($order['status'] == 1 ){ ?>
                                            <a class="me-3 confirm-text" href="index.php?c=order&a=delete&id=<?php echo $order['id']; ?>">
                                                <img src="public/admin/icon/delete.svg" alt="img">
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>