@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thêm danh mục</h4>
                <h6>Thêm một danh mục mới</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="/admin/category/xl_add" method="post">
                        @csrf
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" name="nameCate" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="submit" class="btn btn-submit me-2">Thêm</button>
                            <a href="/admin/category/addView" class="btn btn-cancel">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin/Master/thongtin')