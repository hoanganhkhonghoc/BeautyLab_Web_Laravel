@include('admin/Master/tieude')
<style>
    .khung1{
        left: 100px;
        top: 50px;
        position: absolute;
    }
    .khung2{
        left: 500px;
        top: 50px;
        position: absolute;
    }
    .choose{
        position: absolute;
        text-align: center;
    }
    .sub{
        position: absolute;
        top: 500px;
        left: 400px;
    }
</style>
@include('admin/Master/danhmuc')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Lựa chọn khung bài viết</h4>
            </div>
        </div>

        <div class="card">
            <form action="/admin/baiviet/xulyView" method="POST">
                @csrf
                <div class="khung1">
                    <img src="{{asset("img/View1.png")}}" width="300px" height="450px">
                    <div class="choose"><input type="radio" name="choose" checked value="1">View 1</div>
                </div>
                <div class="khung2">
                    <img src="{{asset("img/View2.png")}}" width="300px" height="450px">
                    <div class="choose"><input type="radio" name="choose" value="2">View 2</div>
                </div>
                <div class="sub">
                    <button type="submit" name="submit">Tiếp tục</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin/Master/thongtin')