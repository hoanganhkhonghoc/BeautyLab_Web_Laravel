<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách người ứng tuyển</h4>
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
                                <th>Tên người tuyển</th>
                                <th>Email</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['newStaff'] as $staff) { ?>
                                <tr>
                                    <td><?php echo $staff['id']; ?></td>
                                    <td><?php echo $staff['name']; ?></td>
                                    <td><?php echo $staff['email']; ?></td>
                                    <td>
                                        <a class="confirm-text" href="index.php?c=staff&a=deleteNewStaff&id=<?php echo $staff['id']; ?>">
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