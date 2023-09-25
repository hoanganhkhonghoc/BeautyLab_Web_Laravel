@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sửa loại sản phẩm</h4>
                <h6>Hãy chú ý các danh mục cần sửa</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="/admin/product/xl_edit/{{$data["product"]->id}}" method="POST">
                        @csrf
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="namePro" required value="{{$data["product"]->namePro}}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="select slchon288x40" name="cat_id">
                                    @foreach($data['category'] as $category)
                                        <option @if($data['product']->cat_id == $category['id'])  selected  @endif value={{$category['id']}}>
                                            {{$category["nameCate"]}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="select" name="isDeleted">
                                    <option value=1>Mở bán</option>
                                    <option value=0>Hết hàng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" name="submit">Sửa</button>
                            <a href="/admin/product/editView/{{}}" class="btn btn-cancel">Huỷ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@include('admin/Master/thongtin')