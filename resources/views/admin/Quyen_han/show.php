<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h2>Quyền hạn được trao</h2>
                <h3 style="color:red;">Tài khoản: ID = <?php echo $_GET['id']; ?></h3>
            </div>
        </div>
        <div class="thongtindonhang">
            <form action="index.php?c=quyen&a=update&id=<?php echo $_GET['id']; ?>" method="POST">
                <table width="100%">
                    <th>
                    <td colspan="2">Quyền</td>
                    </th>
                    <tr>
                        <td width="50%">&emsp;Quản lý bình luận</td>
                        <td><input type="checkbox" name="binh_luan" value="<?php if ($data['quyen']['binh_luan'] == 1) {
                                                                                echo '1';
                                                                            } else {
                                                                                echo '0';
                                                                            }?>" <?php if ($data['quyen']['binh_luan'] == 1) {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?> /> </td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý lịch hẹn</td>
                        <td><input type="checkbox" name="lich_dat_truoc" value="<?php if ($data['quyen']['lich_dat_truoc'] == 1) {
                                                                                    echo '1';
                                                                                } else {
                                                                                    echo '0';
                                                                                } ?>" <?php if ($data['quyen']['lich_dat_truoc'] == 1) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý đơn tuyển dụng</td>
                        <td><input type="checkbox" name="tuyen_dung" value="<?php if ($data['quyen']['tuyen_dung'] == 1) {
                                                                                echo '1';
                                                                            } else {
                                                                                echo '0';
                                                                            } ?>" <?php if ($data['quyen']['tuyen_dung'] == 1) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý sản phẩm và danh mục</td>
                        <td><input type="checkbox" name="ql_san_pham" value="<?php if ($data['quyen']['ql_san_pham'] == 1) {
                                                                                    echo '1';
                                                                                } else {
                                                                                    echo '0';
                                                                                } ?>" <?php if ($data['quyen']['ql_san_pham'] == 1) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý đơn hàng và trạng thái</td>
                        <td><input type="checkbox" name="xl_donhang" value="<?php if ($data['quyen']['xl_donhang'] == 1) {
                                                                                echo '1';
                                                                            } else {
                                                                                echo '0';
                                                                            } ?>" <?php if ($data['quyen']['xl_donhang'] == 1) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý tài khoản khách hàng</td>
                        <td><input type="checkbox" name="ql_khachhang" value="<?php if ($data['quyen']['ql_khachhang'] == 1) {
                                                                                    echo '1';
                                                                                } else {
                                                                                    echo '0';
                                                                                } ?>" <?php if ($data['quyen']['ql_khachhang'] == 1) {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?>></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý bài viết</td>
                        <td><input type="checkbox" name="ql_baiviet" value="<?php if ($data['quyen']['ql_baiviet'] == 1) {
                                                                                echo '1';
                                                                            } else {
                                                                                echo '0';
                                                                            } ?>" <?php if ($data['quyen']['ql_baiviet'] == 1) {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="2">
                            <button name="submit" type="submit" style="border-radius: 10px; background-color:white; padding:5px;">Cập nhật</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>