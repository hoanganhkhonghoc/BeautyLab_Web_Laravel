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
                <form action="/admin/staff/xl_edit/{{$data['staff']->id}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên nhân viên</label>
                                <input type="text" name="name" value="{{$data['staff']->name}}" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$data["staff"]->email}}" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-input" name="pass" placeholder="Không thể hiển thị vì lý do bảo mật !! " value="{{$data['staff']->password}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="phone" value="{{$data["staff"]->phone}}" required>
                            </div>
                            <div class="form-group">
                                <label>Cơ sở</label>
                                <select class="select slchon288x40" name="fac_id" value="{{$data['staff']->facilities_id}}">
                                    @foreach($data['fac'] as $fac)
                                        <option value="{{$fac['id']}}" @if($fac['id'] == $data['staff']->facilities_id)
                                                                                            selected
                                                                        @endif
                                                                        >{{$fac['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <div class="pass-group ">
                                    <input type="text" class=" pass-inputs" name="address" value="{{$data['staff']->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit" name="submit">Cập nhật</button>
                            <a href="/admin/staff/show/{{$data['staff']->id}}" class="btn btn-cancel">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
@include('admin/Master/thongtin')