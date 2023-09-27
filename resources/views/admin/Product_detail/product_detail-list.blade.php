
@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách chi tiết sản phẩm</h4>
                <h6>Quản lý những chi tiết sản phẩm của bạn</h6>
            </div>
            <div class="page-btn">
                <a href="/admin/product_detail/addView/{{$data['id']}}" class="btn btn-added"><img src="{{asset('admin/icon/plus.svg')}}" alt="img" class="me-1">Thêm mới chi tiết sản phẩm</a>
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
                                <th>ID chi tiết sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['product'] as $product)
                                <tr>
                                    <td>{{$product['id']}}</td>
                                    <td class="productimgname">
                                        <a href="#" class="product-img">
                                            <img src="{{asset("img/" . $product['img'])}}" alt="product">
                                        </a>
                                        <a href="/admin/product_detail/show/{{$product['id']}}">{{$product['namePro'] ."(". $product["color"]. ")"}}</a>
                                    </td>

                                    <td>{{number_format($product['price'])}}</td>
                                    <td>{{number_format($product['quanity'])}}</td>
                                    <td>
                                        <a class="me-3" href="/admin/product_detail/show/{{$product['id']}}">
                                            <img src="{{asset("admin/icon/eye.svg")}}" alt="img">
                                        </a>
                                        <a class="me-3" href="/admin/product_detail/editView/{{$product['id']}}">
                                            <img src="{{asset("admin/icon/edit.svg")}}" alt="img">
                                        </a>
                                        <a class="confirm-text" href="/admin/product_detail/xl_delete/{{$product['id']}}">
                                            <img src="{{asset("admin/icon/delete.svg")}}" alt="img">
                                        </a>
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