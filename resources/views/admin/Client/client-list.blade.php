@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách khách hàng đã tạo tài khoản</h4>
                <h6>Quản lý tài khoản khách hàng</h6>
            </div>
            <div class="page-btn">
                <a href="/admin/client/addView" class="btn btn-added"><img src="{{asset('admin/icon/plus.svg')}}" alt="img" class="me-1">Thêm tài khoản khách hàng mới</a>
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
                                <th>ID khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $client)
                                <tr>
                                    <td>{{$client['id']}}</td>
                                    <td>{{$client['name']}}</td>
                                    <td>{{$client['email']}}</td>
                                    <td>{{$client["phone"]}}</td>
                                    <td>@if($client['sex'] == 1)
                                            Nam
                                        @endif
                                        @if($client['sex'] == 2)
                                            Nữ
                                        @endif
                                    </td>
                                    <td>
                                        <a class="me-3" href="/admin/client/show/{{$client['id']}}">
                                            <img src="{{asset('admin/icon/eye.svg')}}" alt="img">
                                        </a>
                                        <a class="me-3" href="/admin/client/show/{{$client['id']}}">
                                            <img src="{{asset('admin/icon/edit.svg')}}" alt="img">
                                        </a>
                                        <a class="confirm-text" href="/admin/client/xl_deleted/{{$client['id']}}">
                                            <img src="{{asset('admin/icon/delete.svg')}}" alt="img">
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