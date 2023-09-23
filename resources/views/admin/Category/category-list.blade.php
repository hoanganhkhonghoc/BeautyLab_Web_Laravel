@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Danh sách danh mục</h4>
            </div>
            <div class="page-btn">
                <a href="/admin/category/addView" class="btn btn-added"><img src="{{asset('admin/icon/plus.svg')}}" alt="img" class="me-1">Thêm danh mục</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>ID danh mục</th>
                                <th>Tên danh mục</th>
                                @if(Auth::guard("admin")->check())
                                    <th>Người sửa gần nhất</th>
                                @endif
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td class="productimgname">{{$category->nameCate}}</td>
                                    @if(Auth::guard("admin")->check())
                                        <td>{{$category->staff_id}}</td>
                                    @endif
                                    <td>
                                        <a class="me-3" href="/admin/category/editView/{{$category->id}}">
                                            <img src="{{asset('admin/icon/edit.svg')}}" alt="img">
                                        </a>
                                        <a class="me-3 confirm-text" href="/admin/category/xl_delete/{{$category->id}}">
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