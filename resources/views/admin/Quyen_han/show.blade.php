@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h2>Quyền hạn được trao</h2>
                <h3 style="color:red;">Tài khoản: ID = {{$data->id}}</h3>
            </div>
        </div>
        <div class="thongtindonhang">
            <form action="/admin/quyen/xl_edit/{{$data->id}}" method="POST">
                @csrf
                <table width="100%">
                    <th>
                    <td colspan="2">Quyền</td>
                    </th>
                    <tr>
                        <td width="50%">&emsp;Quản lý bình luận</td>
                        <td><input type="checkbox" name="binh_luan" @if($data->ql_binhluan == 1) checked @endif></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý lịch hẹn</td>
                        <td><input type="checkbox" name="lich_dat_truoc" @if($data->ql_lichdattruoc == 1)
                                                                                            checked
                                                                                         @endif ></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý đơn tuyển dụng</td>
                        <td><input type="checkbox" name="tuyen_dung" @if($data->ql_tuyendung == 1)
                                                                                            checked
                                                                                         @endif ></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý sản phẩm và danh mục</td>
                        <td><input type="checkbox" name="ql_san_pham" @if($data->ql_sanpham == 1)
                                                                                            checked
                                                                                         @endif ></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý đơn hàng và trạng thái</td>
                        <td><input type="checkbox" name="xl_donhang" @if($data->ql_donhang == 1)
                                                                                            checked
                                                                                         @endif ></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý tài khoản khách hàng</td>
                        <td><input type="checkbox" name="ql_khachhang" @if($data->ql_khachhang == 1)
                                                                                            checked
                                                                                         @endif ></td>
                    </tr>
                    <tr>
                        <td>&emsp;Quản lý bài viết</td>
                        <td><input type="checkbox" name="ql_baiviet" @if($data->ql_baiviet == 1)
                                                                                            checked
                                                                                         @endif ></td>
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
@include('admin/Master/thongtin')