@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách comment</h4>
                <h6>Quản lý comment</h6>
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
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Nội dung Commnet</th>
                                <th>Người comment</th>
                                <th>Thông tin liên hệ</th>
                                <th>Thông tin liên hệ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data["comment"] as $comment)
                                <tr>
                                    <td>{{$comment['id']}}</td>
                                    <td class="productimgname">
                                        <a href="#" class="product-img">
                                            <img src="{{asset("img/" . $comment['img'])}}" alt="product">
                                        </a>
                                        <a href="/admin/product_detail/show/{{$comment['Pro_id']}}">{{$comment['namePro']}}</a>
                                    </td>

                                    <td>{{$comment['content']}}</td>
                                    <td>{{$comment["name"]}}</td>
                                    <td>{{$comment["phone"]}}</td>
                                    <td>{{$comment["email"]}}</td>
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