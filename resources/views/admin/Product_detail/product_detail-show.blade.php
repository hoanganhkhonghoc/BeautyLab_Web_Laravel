@include('admin/Master/tieude')
@include('admin/Master/danhmuc')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Thông tin sản phẩm</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bar-code-view">
                           {{ $data['product']->namePro . ' ( ' . $data['product']->color . ' )'}}
                        </div>
                        <div class="productdetails">
                            <ul class="product-bar">
                                <li>
                                    <h4>Tên sản phẩm</h4>
                                    <h6>{{ $data['product']->namePro}}</h6>
                                </li>
                                <li>
                                    <h4>Danh mục sản phẩm</h4>
                                    <h6>{{ $data['product']->nameCate}}</h6>
                                </li>

                                <li>
                                    <h4>Màu sắc</h4>
                                    <h6>{{ $data['product']->color}}</h6>
                                </li>
                                <li>
                                    <h4>Số lượng</h4>
                                    <h6>{{ number_format( $data['product']->quanity) }}</h6>
                                </li>
                                <li>
                                    <h4>Giá sản phẩm</h4>
                                    <h6>{{ number_format($data['product']->price)}} VNĐ</h6>
                                </li>


                                <li>
                                    <h4>Tình trạng</h4>
                                    <h6><?php switch ($data['product']->isSoid) {
                                            case 1:
                                                echo 'Còn hàng';
                                                break;
                                            case 2:
                                                echo 'Sắp hết';
                                                break;
                                            case 0:
                                                echo 'Hết hàng';
                                                break;
                                        } ?></h6>
                                </li>
                                <li>
                                    <h4>Mô tả chi tiết</h4>
                                    <h6>{{$data['product']->detail}}</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="slider-product-details">
                            <div class="owl-carousel owl-theme product-slide">
                                <div class="slider-product">
                                    <img src="{{asset('img/'. $data['product']->img)}}" alt="img">
                                    <h4>{{$data['product']->img}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@include('admin/Master/thongtin')