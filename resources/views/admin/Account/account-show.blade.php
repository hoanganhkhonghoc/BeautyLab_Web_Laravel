
@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thông tin tài khoản</h4>
                <h6>Kiểm tra kĩ thông tin</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                {{-- <form action="" method="POST"> --}}
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" name="name" value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$data->email}}" >
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-input" name="pass" placeholder="Không thể hiển thị vì lý do bảo mật !! ">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" value="{{$data->phone}}">
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="select slchon288x40" name="sex" value="{{$data->sex}}">
                                    <option value=1 @if($data->sex == 1)
                                                        selected
                                                    @endif>Nam</option>
                                    <option value=2 @if($data->sex == 2)
                                                        selected
                                                    @endif>Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <div class="pass-group ">
                                    <input type="text" class=" pass-inputs" name="address" value="{{$data->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            {{-- <button class="btn btn-submit me-2" type="submit" name="submit">Cập nhật</button> --}}
                            <button class="btn btn-submit me-2" name="submit">Cập nhật</button>
                            <a href="index.php?c=index&a=index" class="btn btn-cancel">Quay lại</a>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>

    </div>
</div>
</div>
@include('admin/Master/thongtin')