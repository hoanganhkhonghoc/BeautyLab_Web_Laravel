<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách lịch hẹn ngày <?php echo $_GET['day']; ?></h4>
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
                                <th>Tên khách hàng</th>
                                <th>Sđt liên hệ</th>
                                <th>Email</th>
                                <th>Dịch vụ</th>
                                <th>Thông tin</th>
                                <?php if ($_SESSION['account']['level'] == 1) { ?>
                                    <th>Cơ sở đặt</th>
                                <?php } ?>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data['appointment'] as $app) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $app['name']; ?></td>
                                    <td><?php echo $app['phone']; ?></td>
                                    <td><?php echo $app['email']; ?></td>
                                    <td><?php switch ($app['service']) {
                                            case 1:
                                                echo 'Chăm sóc da mặt';
                                                break;
                                            case 2:
                                                echo 'Chăm sóc móng tay';
                                                break;
                                            case 3:
                                                echo 'Chăm sóc mắt';
                                                break;
                                            case 4:
                                                echo 'Tẩy lông';
                                                break;
                                            case 5:
                                                echo 'Trang điểm';
                                                break;
                                        } ?></td>
                                    <td><?php echo $app['detail']; ?></td>
                                    <?php if ($_SESSION['account']['level'] == 1) { ?>
                                        <td><?php echo $app['f_name']; ?></td>
                                    <?php } ?>
                                    <td>
                                        <a class="me-3" href="index.php?c=appointment&a=delete&id=<?php echo $app['id']; ?>&day=<?php echo $_GET['day']; ?>&month=<?php echo $_GET['month']; ?>">
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