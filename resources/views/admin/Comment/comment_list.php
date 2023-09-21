<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách comment</h4>
                <h6>Quản lý comment</h6>
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
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Nội dung Commnet</th>
                                <th>Người comment</th>
                                <th>Thông tin liên hệ</th>
                                <th>Thông tin liên hệ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $total) { ?>
                                <tr>
                                    <td><?php echo $total['id']; ?></td>
                                    <td class="productimgname">
                                        <a href="#" class="product-img">
                                            <img src="public/uploads/<?php echo $total['img']; ?>" alt="product">
                                        </a>
                                        <a href="index.php?c=product_detail&a=show&id=<?php echo $total['product_detail_id']; ?>"><?php echo $total['namePro'] ; ?></a>
                                    </td>

                                    <td><?php echo $total['content']; ?></td>
                                    <td><?php echo $total['name']; ?></td>
                                    <td><?php echo '0'. $total['phone']; ?></td>
                                    <td><?php echo $total['email']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>