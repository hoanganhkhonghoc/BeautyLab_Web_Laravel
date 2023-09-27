@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thêm cơ sở</h4>
                <h6></h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="/admin/facilities/xl_add" method="post">
                        @csrf
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Cơ sở</label>
                                <input type="text" name="name" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit" name="submit">Thêm cơ sở</button>
                            <a href="/admin/facilities/list" class="btn btn-cancel">Trở lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin/Master/thongtin')