@include('admin/Master/tieude')
@include('admin/Master/danhmuc')
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget">
                            <div class="dash-widgetimg">
                                <span><img src="{{asset('admin/icon/dash1.svg')}}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="{{$data['countOrderInMonth']}}"></span> đơn</h5>
                                <h6>Số đơn trong tháng</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash1">
                            <div class="dash-widgetimg">
                                <span><img src="{{asset('admin/icon/dash2.svg')}}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="{{$data["sumPriceOrderInMonth"]}}"></span> VNĐ</h5>
                                <h6>Danh thu trong tháng</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="{{asset('admin/icon/dash4.svg')}}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="{{$data['tanglen']}}"></span> đơn</h5>
                                <h6>Đơn hàng tăng so với tháng trước</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash3">
                            <div class="dash-widgetimg">
                                <span><img src="{{asset('admin/icon/dash3.svg')}}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="{{$data["giamdi"]}}"></span> đơn</h5>
                                <h6>Đơn hàng giảm so với tháng trước</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h5><a href="/admin/count/10">Sản phẩm sắp hết</a></h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h5><a href="/admin/count/0">Sản phẩm đã hết</a></h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Ngăn chặn người sử dụng không có quyền truy cập vào quyền quản lý -->
                    @if(Auth::guard("admin")->check() || Session::get("QuyenHan")->ql_donhang == 1)
                        <div class="col-lg-3 col-sm-6 col-12 d-flex">
                            <div class="dash-count das2">
                                <div class="dash-counts">
                                    <h5><a href="/admin/order/selectedOrder/1" style="color:white;">Đơn hàng đang chờ duyệt</a></h5>
                                </div>
                                <div class="dash-imgs">
                                    <i data-feather="file-text"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12 d-flex">
                            <div class="dash-count das3">
                                <div class="dash-counts">
                                    <h5><a href="/admin/order/selectedOrder/0" style="color:white;">Đơn hàng đã huỷ</a></h5>
                                </div>
                                <div class="dash-imgs">
                                    <i data-feather="file"></i>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-lg-7 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Đơn hàng và doanh thu</h5>
                                <div class="graph-sets">
                                    
                                    <div class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            2023 <img src="{{asset('admin/icon/dropdown.svg')}}" alt="img" class="ms-2">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2023</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Ngăn chặn người dùng không có quyền quản lý sản phẩm -->
                    <div class="col-lg-5 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Những sản phẩm bán chạy trong tháng</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng bán</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['product5limit'] as $pro)
                                            <tr>
                                                <td>{{$pro['id']}}</td>
                                                <td class="productimgname">
                                                    <a href="/admin/product_detail/show/{{$pro['id']}}" class="product-img">
                                                        <img src="{{asset("img/" . $pro['img'])}}" alt="product">
                                                    </a>
                                                    <a href="/admin/product_detail/show/{{$pro['id']}}">{{$pro['namePro']}}</a>
                                                </td>
                                                <td>{{$pro['total_sold']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
          const ctx = document.getElementById('myChart');
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: ['Tháng trước', 'Tháng trước', 'Tháng trước', 'Tháng trước', 'Tháng trước', 'Tháng hiện tại'],
              datasets: [{
                label: 'Đơn hàng',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        </script>
@include('admin/Master/thongtin')