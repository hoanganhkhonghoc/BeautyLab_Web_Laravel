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
                <a href="/admin/product/addView" class="btn btn-added"><img src="{{asset('admin/icon/plus.svg')}}" alt="img" class="me-1">Thêm mới sản phẩm</a>
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
                                @if(Auth::guard("admin")->check())
                                    <th>ID người chỉnh gần nhất</th>
                                    <th>Cơ sở</th>
                                @endif
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)
                                <tr>
                                    <td>{{$product['id']}}</td>
                                    <td>{{$product['namePro']}}</td>
                                    <td>{{$product['nameCate']}}</td>
                                    @if(Auth::guard("admin")->check())
                                        <td>{{$product['email']}}</td>
                                        <td>{{$product['name']}}</td>
                                    @endif
                                    <td>
                                        <a class="me-3" href="/admin/product-detail/list/{{$product['id']}}">
                                            <img src="{{asset('admin/icon/eye.svg')}}" alt="img">
                                        </a>
                                        <a class="me-3" href="/admin/product/editView/{{$product['id']}}">
                                            <img src="{{asset('admin/icon/edit.svg')}}" alt="img">
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