<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách cơ sở hiện có</h4>
                <h6>Quản lý cơ sở</h6>
            </div>
            <div class="page-btn">
                <a href="index.php?c=facilities&a=add" class="btn btn-added"><img src="public/admin/icon/plus.svg" alt="img" class="me-1">Thêm cơ sở mới</a>
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
                                <th>STT</th>
                                <th>Tên cơ sở</th>
                                <th>Địa chỉ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data['facilities'] as $fac) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $fac['name']; ?></td>
                                    <td><?php echo $fac['address']; ?></td>
                                    <td>
                                        <a class="me-3" href="index.php?c=facilities&a=show&id=<?php echo $fac['id']; ?>">
                                            <img src="public/admin/icon/eye.svg" alt="img">
                                        </a>
                                        <a class="me-3" href="index.php?c=facilities&a=edit&id=<?php echo $fac['id']; ?>">
                                            <img src="public/admin/icon/edit.svg" alt="img">
                                        </a>
                                        <a class="confirm-text" href="index.php?c=facilities&a=delete&id=<?php echo $fac['id']; ?>">
                                            <img src="public/admin/icon/delete.svg" alt="img">
                                        </a>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>