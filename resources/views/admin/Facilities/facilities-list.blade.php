@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách cơ sở hiện có</h4>
                <h6>Quản lý cơ sở</h6>
            </div>
            <div class="page-btn">
                <a href="/admin/facilities/addView" class="btn btn-added"><img src="{{asset('admin/icon/plus.svg')}}" alt="img" class="me-1">Thêm cơ sở mới</a>
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
                                <th>Tên cơ sở</th>
                                <th>Địa chỉ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $fac)
                                <tr>
                                    <td>{{$fac->id}}</td>
                                    <td>{{$fac->name}}</td>
                                    <td>{{$fac->address}}</td>
                                    <td>
                                        <a class="me-3" href="/admin/facilities/show/{{$fac->id}}">
                                            <img src="{{asset('admin/icon/eye.svg')}}" alt="img">
                                        </a>
                                        <a class="me-3" href="/admin/facilities/editView/{{$fac->id}}">
                                            <img src="{{asset('admin/icon/edit.svg')}}" alt="img">
                                        </a>
                                        <a class="confirm-text" href="/admin/facilities/xl_delete/{{$fac->id}}">
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