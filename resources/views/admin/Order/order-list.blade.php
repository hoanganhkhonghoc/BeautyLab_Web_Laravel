@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Quản lý đơn hàng</h4>
                <h6>Tất cả đơn hàng</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                </div>

                <div class="table-responsive">
                    <a href="/admin/order/selectedOrder/1"><span class="badges bg-lightyellow">Chờ xử lý</span></a>
                    <a href="/admin/order/selectedOrder/2"><span class="badges bg-lightyellow">Đang giao hàng</span></a>
                    <a href="/admin/order/selectedOrder/0"><span class="badges bg-lightred">Đã huỷ</span></a>
                    <table class="table  datanew">
                        <thead>
                            <tr style="text-align:center">
                                <th>ID</th>
                                <th>Ngày đặt đơn</th>
                                <th>Trạng thái sản phẩm</th>
                                <th>Hình thức</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['order'] as $order)
                                <tr>
                                    <td>{{$order['id']}}</td>
                                    <td style="text-align:center">{{$order['date_order']}}</td>
                                    <td style="text-align:center">
                                        @if($order['status'] == 3)
                                            <span class="badges bg-lightgreen">Đã thanh toán</span>
                                        @endif
                                        @if($order['status'] == 0) 
                                            <span class="badges bg-lightred">Đã huỷ</span>
                                        @endif
                                        @if($order['status'] == 1)
                                            <span class="badges bg-lightyellow">Chờ xử lý</span>
                                        @endif
                                        @if($order['status'] == 2)
                                            <span class="badges bg-lightyellow">Đang giao hàng</span>
                                        @endif
                                    </td>
                                    <td>@if($order['detail'] == "2") Chuyển khoản (CKO${{$order['id']. "_" . $order['sum']}}) @else Trực tiếp @endif</td>
                                    <td>
                                        <a class="me-3" href="/admin/order/show/{{$order['id']}}">
                                            <img src="{{asset('admin/icon/edit.svg')}}" alt="img">
                                        </a>
                                        @if($order['status'] == 1)
                                            <a class="me-3 confirm-text" href="/admin/order/deletedOrder/{{$order['id']}}">
                                                <img src="{{asset('admin/icon/delete.svg')}}" alt="img">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin/Master/thongtin')