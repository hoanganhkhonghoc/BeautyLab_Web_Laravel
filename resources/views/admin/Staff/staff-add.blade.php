@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thêm nhân viên mới</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="/admin/staff/xl_add" method="post">
                        @csrf
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên nhân viên</label>
                                <input type="text" name="name" required >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" required >
                            </div>
                            <div class="form-group">
                                <label>Cơ sở</label>
                                <select class="select  slchon288x40" name="fac_id" required >
                                    @foreach ($data as $fac)
                                        <option value="{{$fac['id']}}">{{$fac['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="number" name="phone" required >
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" required >
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <div class="pass-group">
                                    <input type="password" name="pass" class=" pass-input" required>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <div class="pass-group">
                                    <input type="password" name="pass1" class=" pass-inputs" required >
                                    <span class="fas toggle-passworda fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" name="submit" class="btn btn-submit me-2">Tạo mới</button>
                            <a href="/admin/Staff/addView" class="btn btn-cancel">Huỷ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@include('admin/Master/thongtin')