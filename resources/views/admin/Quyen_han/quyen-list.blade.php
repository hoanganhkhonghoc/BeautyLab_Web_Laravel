@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách nhân viên</h4>
                <h6>Quản lý QUYỀN tài khoản nhân viên</h6>
            </div>
            <div class="page-btn">
                <!-- <a href="index.php?c=staff&a=add" class="btn btn-added"><img src="public/admin/icon/plus.svg" alt="img" class="me-1">Thêm tài khoản nhân viên mới</a> -->
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
                                <th>Tên nhân viên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Cơ sở</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $staff)<tr>
                                    <td>{{$staff['id']}}</td>
                                    <td>{{$staff['name']}}</td>
                                    <td>{{$staff['email']}}</td>
                                    <td>{{$staff['phone']}}</td>
                                    <td>{{$staff['fac_name']}}</td>
                                    <td>
                                        <a class="me-3" href="/admin/quyen/show/{{$staff['id']}}">
                                            <img src="{{asset('admin/icon/eye.svg')}}" alt="img">
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