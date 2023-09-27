@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<?php //dd($data) ?>
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sửa chi tiết sản phẩm mới</h4>
                <h6>Sửa đủ các thông tin sản phẩm cần</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Tên sản phẩm (Không cần thay đổi)</label>
                            <input type="text" value="{{ $data['product']->namePro }}">
                        </div>
                    </div>
                    <form action="/admin/product_detail/xl_edit/{{$data['product']->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-3 col-sm-6 col-12 khung2">
                            <div class="form-group chon288x40">
                                <label>Màu sản phẩm</label>
                                <select class="select slchon288x40" name="color" value="{{$data["product"]->color}}">
                                    <option value="Đỏ" @if($data['product']->color == 'Đỏ')
                                                            selected
                                                        @endif>Đỏ</option>
                                    <option value="Trắng" @if($data['product']->color == 'Trắng')
                                                            selected
                                                            @endif>Trắng</option>
                                    <option value="Đen" @if($data['product']->color == 'Đen') 
                                                                selected
                                                        @endif>Đen</option>
                                    <option value="Tím" @if($data['product']->color ==  'Tím')
                                                                selected
                                                        @endif>Tím</option>
                                    <option value="Xanh dương" @if($data['product']->color ==   'Xanh dương')
                                                                selected
                                                                @endif>Xanh dương</option>
                                    <option value="Xanh lá" @if($data['product']->color ==  'Xanh lá')
                                                                selected
                                                            @endif>Xanh lá</option>
                                    <option value="Vàng" @if($data['product']->color ==  'Vàng')
                                                                selected
                                                            @endif>Vàng</option>
                                    <option value="Cam" @if($data['product']->color == 'Cam')
                                                                selected
                                                        @endif>Cam</option>
                                    <option value="Hồng" @if($data['product']->color ==   'Hồng') 
                                                                selected
                                                          @endif>Hồng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 khung3">
                            <div class="form-group ">
                                <label>Số lượng sản phẩm</label>
                                <input type="number" name="quanity" class="slchon288x40" value="{{$data['product']->quanity}}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea class="form-control" name="detail" placeholder="{{$data['product']->detail}}"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Giá chi tiết</label>
                                <input type="number" class="slchon288x40" name="price" value="{{$data['product']->price}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 khung4">
                            <div class="form-group">
                                <label>Tình trạng hàng</label>
                                <select class="select slchon288x40" name="isSoid" value="{{$data["product"]->isSoid}}>">
                                    <option value=1>Còn</option>
                                    <option value=2>Sắp hết</option>
                                    <option value=0>Hết</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Hình ảnh sản phẩm</label>
                                <div class="image-upload">
                                    <input type="file" accept="image/*" name="imgPro" value="{{$data['product']->img}}">
                                    <input type="hidden" name="img" value="{{$data['product']->img}}">
                                    <div class="image-uploads">
                                        <img src="{{asset('admin/icon/upload.svg')}}" alt="img">
                                        <h4>Chọn đúng hình ảnh</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="product-list">
                                <ul class="row">
                                    <li>
                                        <div class="productviews">
                                            <div class="productviewsimg">
                                                <img src="{{asset("img/". $data["product"]->img)}}" alt="img">
                                            </div>
                                            <div class="productviewscontent">
                                                <div class="productviewsname">
                                                    <h2>{{$data['product']->img}}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit" name="submit" class="btn btn-submit me-2">Sửa</button>
                    <a href="/admin/produc_detail/editView/{{$data['id']}}" class="btn btn-cancel">Huỷ</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@include('admin/Master/thongtin')