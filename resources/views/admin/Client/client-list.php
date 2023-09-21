<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách khách hàng đã tạo tài khoản</h4>
                <h6>Quản lý tài khoản khách hàng</h6>
            </div>
            <div class="page-btn">
                <a href="index.php?c=client&a=add" class="btn btn-added"><img src="public/admin/icon/plus.svg" alt="img" class="me-1">Thêm tài khoản khách hàng mới</a>
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
                                <th>ID khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['client'] as $client) { ?>
                                <tr>
                                    <td><?php echo $client['id']; ?></td>
                                    <td><?php echo $client['name']; ?></td>
                                    <td><?php echo $client['email']; ?></td>
                                    <td><?php echo '+84 ' . $client['phone']; ?></td>
                                    <td><?php switch ($client['sex']) {
                                            case 1:
                                                echo 'Nam';
                                                break;
                                            case 2:
                                                echo 'Nữ';
                                                break;
                                        } ?></td>
                                    <td>
                                        <a class="me-3" href="index.php?c=client&a=show&id=<?php echo $client['id']; ?>">
                                            <img src="public/admin/icon/eye.svg" alt="img">
                                        </a>
                                        <a class="me-3" href="index.php?c=client&a=show&id=<?php echo $client['id']; ?>">
                                            <img src="public/admin/icon/edit.svg" alt="img">
                                        </a>
                                        <a class="confirm-text" href="index.php?c=client&a=delete&id=<?php echo $client['id']; ?>">
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