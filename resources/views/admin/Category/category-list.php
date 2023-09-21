<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách danh mục</h4>
            </div>
            <div class="page-btn">
                <a href="index.php?c=category&a=add" class="btn btn-added"><img src="public/admin/icon/plus.svg" alt="img" class="me-1">Thêm danh mục</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID danh mục</th>
                                <th>Tên danh mục</th>
                                <?php if ($_SESSION['account']['level'] == 1) { ?>
                                    <th>Người sửa gần nhất</th>
                                <?php } ?>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['category'] as $cate) { ?>
                                <tr>
                                    <td><?php echo $cate['id']; ?></td>
                                    <td class="productimgname"><?php echo $cate['nameCate']; ?></td>
                                    <?php if ($_SESSION['account']['level'] == 1) { ?>
                                        <td><?php echo $cate['staff_id']; ?></td>
                                    <?php } ?>
                                    <td>
                                        <a class="me-3" href="index.php?c=category&a=edit&id=<?php echo $cate['id']; ?>">
                                            <img src="public/admin/icon/edit.svg" alt="img">
                                        </a>
                                        <a class="me-3 confirm-text" href="index.php?c=category&a=delete&id=<?php echo $cate['id']; ?>">
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