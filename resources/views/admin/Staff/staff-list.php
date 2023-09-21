<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách nhân viên</h4>
                <h6>Quản lý tài khoản nhân viên</h6>
            </div>
            <div class="page-btn">
                <a href="index.php?c=staff&a=add" class="btn btn-added"><img src="public/admin/icon/plus.svg" alt="img" class="me-1">Thêm tài khoản nhân viên mới</a>
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
                                <th>Cơ sở</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['staff'] as $staff) { ?>
                                <tr>
                                    <td><?php echo $staff['id']; ?></td>
                                    <td><?php echo $staff['name']; ?></td>
                                    <td><?php echo $staff['email']; ?></td>
                                    <td><?php echo '+84 0' . $staff['phone']; ?></td>
                                    <td><?php echo $staff['f_name']; ?></td>
                                    <td>
                                        <a class="me-3" href="index.php?c=staff&a=show&id=<?php echo $staff['id']; ?>">
                                            <img src="public/admin/icon/eye.svg" alt="img">
                                        </a>
                                        <a class="me-3" href="index.php?c=staff&a=show&id=<?php echo $staff['id']; ?>">
                                            <img src="public/admin/icon/edit.svg" alt="img">
                                        </a>
                                        <a class="confirm-text" href="index.php?c=staff&a=delete&id=<?php echo $staff['id']; ?>">
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