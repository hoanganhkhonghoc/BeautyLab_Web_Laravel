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
                <a href="/admin/baiviet/choose" class="btn btn-added"><img src="{{asset('admin/icon/plus.svg')}}" alt="img" class="me-1">Thêm bài viết mới</a>
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
                                <th>Tiêu đề</th>
                                <th>Người viết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $post)<tr>
                                    <td>{{$post['id']}}</td>
                                    <td>{{$post['tieude1']}}</td>
                                    <td>{{$post['staff_id']}}</td>
                                    <td>
                                        <a class="me-3" href="/admin/baiviet/show/{{$post['id']}}">
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