@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách sản phẩm</h4>
                <h6>Cơ sở <?php //echo $data['product']['name']; ?></h6>
            </div>
            <div class="page-btn">
                <a href="index.php?c=product&a=add" class="btn btn-added"><img src="{{asset('admin/icon/plus.svg')}}" alt="img" class="me-1">Thêm mới sản phẩm</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{asset('admin/icon/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <?php //if ($_SESSION['account']['level'] == 1) { ?>
                                    <th>ID người chỉnh gần nhất</th>
                                <?php //} ?>
                                <?php //if ($_SESSION['account']['level'] == 1) { ?>
                                    <th>Cơ sở</th>
                                <?php //} ?>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //foreach ($data['product'] as $pro) { ?>
                                <tr>
                                    <td><?php //echo $pro['id']; ?></td>
                                    <td><?php //echo $pro['namePro']; ?></td>
                                    <td><?php //echo $pro['nameCate']; ?></td>
                                    <?php //if ($_SESSION['account']['level'] == 1) { ?>
                                        <td><?php //echo $pro['staff_id']; ?></td>
                                    <?php //} ?>
                                    <?php //if ($_SESSION['account']['level'] == 1) { ?>
                                        <td><?php //echo $pro['name']; ?></td>
                                    <?php //} ?>
                                    <td>
                                        <a class="me-3" href="index.php?c=product_detail&a=index&id=<?php //echo $pro['id']; ?>">
                                            <img src="{{asset('admin/icon/eye.svg')}}" alt="img">
                                        </a>
                                        <a class="me-3" href="index.php?c=product&a=edit&id=<?php //echo $pro['id']; ?>">
                                            <img src="{{asset('admin/icon/edit.svg')}}" alt="img">
                                        </a>
                                    </td>
                                </tr>
                            <?php //} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin/Master/thongtin')