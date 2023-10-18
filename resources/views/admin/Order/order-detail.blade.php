@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thông tin</h4>
                <h6>Thông tin đơn hàng</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                </div>

                <div class="card mb-0" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tongdon = 0; ?>
                            @foreach($data['product'] as $pro)
                                <tr>
                                    <td>{{$pro['id']}}</td>
                                    <td class="productimgname">
                                        <a href="#" class="product-img">
                                            <img src="{{asset("img/" . $pro['img'])}}" alt="product">
                                        </a>
                                        <a href="#">{{$pro['namePro'] . "(" . $pro['color'] . ")"}}</a>
                                    </td>
                                    <td>{{number_format($pro['price']) . ' VNĐ'}}</td>
                                    <td>{{number_format($pro['quanity'])}}</td>
                                    <?php $tongtiensanpham = $pro['price'] * $pro['quanity'];  ?>
                                    <td>{{number_format($tongtiensanpham) . ' VNĐ'}}</td>
                                    <?php $tongdon += $tongtiensanpham ?>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="thongtindonhang">
            <table width="100%">
                <tr>
                    <td colspan="2" style="text-align:center">Thông tin đơn hàng</td>
                    <td colspan="2" style="text-align:center">Thông tin người nhận</td>
                </tr>
                <tr>
                    <td>Tổng tiền sản phẩm: </td>
                    <td>{{number_format($tongdon) . ' VNĐ'}}</td>
                    <td style="color:red; font-weight:bold">Tên người nhận: </td>
                    <td>{{$data['order']->name}}</td>
                </tr>
                <tr>
                    <td>Mã giảm giá được áp dụng: </td>
                    <td><?php //echo number_format($data['order']['sum_total'] - $tongdon - 30000) . ' VNĐ'; ?></td>
                    <td style="color:red; font-weight:bold">Số điện thoại người nhận: </td>
                    <td>{{$data['order']->phone}}</td>
                </tr>
                <tr>
                    <td>Chi phí vận chuyển: </td>
                    <td>{{number_format(30000) . ' VNĐ'}}</td>
                    <td style="color:red; font-weight:bold">Địa chỉ giao hàng: </td>
                    <td>{{$data['order']->address}}</td>
                </tr>
                <tr>
                    <td>Tổng đơn: </td>
                    <td>{{number_format($data['order']->sum) . ' VNĐ'}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Hình thức vận chuyển: </td>
                    <td>{{$data['order']->namePay}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Trạng thái đơn hàng: </td>
                    <td><?php switch($data['order']->status){
                        case 0:
                            echo 'Đơn hàng đã huỷ';
                            break;
                        case 1:
                            echo 'Đang chờ xử lý đơn';
                            break;
                        case 2:
                            echo 'Đơn hàng đang giao';
                            break;
                        case 3:
                            echo 'Đã giao hàng thành công';
                            break;
                    } ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <form method="post" action="/admin/order/updateOrder/{{$data['order']->id}}">
                @csrf
                <tr>
                    <td style="color: blue">Thay đổi trạng thái</td>
                    <td><select name="status">
                        @if($data['order']->status == 1 || $data['order']->status < 2)
                            <option value="0" @if($data['order']->status == 0) selected @endif>Huỷ đơn</option>
                        @endif
                        @if($data['order']->status == 1)
                            <option value="1" @if($data['order']->status == 1) selected @endif>Chờ xử lý</option>
                        @endif
                        @if($data['order']->status == 1 || $data['order']->status == 2)
                            <option value="2" @if($data['order']->status == 2) selected @endif>Đang giao hàng</option>
                        @endif
                        @if($data['order']->status == 1 || $data['order']->status == 2)
                            <option value="3" @if($data['order']->status == 3) selected @endif>Giao thành công</option>
                        @endif
                    </select></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="text-align: center;">
                    @if($data['order']->status >= 1 && $data['order']->status <= 2)
                        <td colspan="4"><button type="submit" name="submit" style="border-radius: 10px; background-color:white; padding:5px;">Cập nhật</button></td>
                    @endif
                </tr>
                </form>
            </table>
        </div>
    </div>
</div>
@include('admin/Master/thongtin')