<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách chi tiết sản phẩm</h4>
                <h6>Quản lý những chi tiết sản phẩm của bạn</h6>
            </div>
            <div class="page-btn">
                <a href="index.php?c=product_detail&a=add&id=<?php echo $_GET['id']; ?>" class="btn btn-added"><img src="public/admin/icon/plus.svg" alt="img" class="me-1">Thêm mới chi tiết sản phẩm</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="public/admin/icon/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID chi tiết sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['product_detail'] as $pro) { ?>
                                <tr>
                                    <td><?php echo $pro['id']; ?></td>
                                    <td class="productimgname">
                                        <a href="#" class="product-img">
                                            <img src="public/uploads/<?php echo $pro['img']; ?>" alt="product">
                                        </a>
                                        <a href="index.php?product_detail&a=show&id=<?php echo $pro['id']; ?>"><?php echo $data['product']['namePro'] . ' ( ' . $pro['color'] . ' )'; ?></a>
                                    </td>

                                    <td><?php echo $pro['price']; ?></td>
                                    <td><?php echo $pro['quanity']; ?></td>
                                    <td>
                                        <a class="me-3" href="index.php?c=product_detail&a=show&id=<?php echo $pro['id']; ?>">
                                            <img src="public/admin/icon/eye.svg" alt="img">
                                        </a>
                                        <a class="me-3" href="index.php?c=product_detail&a=edit&id=<?php echo $pro['id']; ?>&idLis=<?php echo $_GET['id']; ?>">
                                            <img src="public/admin/icon/edit.svg" alt="img">
                                        </a>
                                        <a class="confirm-text" href="index.php?c=product_detail&a=delete&id=<?php echo $pro['id']; ?>&idLis=<?php echo $_GET['id']; ?>">
                                            <img src="public/admin/icon/delete.svg" alt="img">
                                        </a>
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