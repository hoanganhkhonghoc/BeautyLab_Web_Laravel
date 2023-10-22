<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Quyen_Han;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class LoginAuthController extends Controller
{
    public function showViewLogin(){
        notyf()->position('x', 'center')
                ->position('y', 'top')
                ->addWarning("Hãy đăng nhập tài khoản !!");
        return view("/site/Login/login");
    }

    public function login(Request $request){
        // khi đăng nhập tài khoản cũng có nghĩa là tài khoản chưa đăng nhập 
        // nếu đang từ home hay 1 trang bất kì nào khác mà quay về login có nghĩa tài khoản đã bị đăng xuất
        // check đăng xuất ở đây
        Auth::guard("admin")->logout();
        Auth::guard("staff")->logout();
        Auth::guard("client")->logout();

        // xử lý login lấy dữ liệu tài khoản Request 
        // validate dữ liệu
        $email = $request->email;
        $password = $request->password;
        // Lấy số năm hiện tại lưu vào ss
        $yearCurrent = Carbon::now()->year;
        Session::put("year", $yearCurrent);
        // check quyền
        if(Auth::guard("admin")->attempt(["email" => $email, "password" => $password])){
            // đăng nhập thành công trong bảng admin thì return view home bên admin
            notyf()->addSuccess("Đăng nhập thành công! Chào bạn " . Auth::guard("admin")->user()->name . "!!");
            // flash()->addSuccess("Đăng nhập thành công! Chào bạn " . Auth::guard("admin")->user()->name . "!!");
            return redirect("/admin/home/index/" . $yearCurrent);
        }
        if(Auth::guard("staff")->attempt(["email" => $email, "password" => $password])){
            // đăng nhập thành công trong bảng staff thì return view home bên admin và kiểm tra quyền
            $quyenhan = Quyen_Han::where("staff_id", Auth::guard('staff')->user()->id)->first();
            // Tránh trường hợp người dùng đang ở bên trong thì Session vẫn tồn tại nên khi đăng nhập lại cho unset SS
            if(Session::has("QuyenHan")){
                Session::forget("QuyenHan");
            }
            // Kiểm tra bảng quyenhan có bản ghi trả về không
            if($quyenhan){
                Session::put("QuyenHan", $quyenhan);
            }
            notyf()->addSuccess("Đăng nhập thành công! Chào bạn " . Auth::guard("staff")->user()->name . "!!");
            return redirect("/admin/home/index/". $yearCurrent);
        }
        if(Auth::guard("client")->attempt(["email" => $email, "password" => $password])){
            // đăng nhập thành công trong bảng site thì return view home bên site
            notyf()->addSuccess("Đăng nhập thành công! Chào bạn " . Auth::guard("client")->user()->name . "!!");
            return redirect()->route(("homeSite"));
        }

        // đăng nhập thất bại khi tìm kiếm cả 3 bảng trên đều không có dữ liệu phù hợp thì trả về view login
        notyf()->addError("Đăng nhập thất bại !!! Kiểm tra tên email và mật khẩu !! ");
        return redirect()->route("showViewLogin");
    }

    public function logout(){
        Auth::guard("admin")->logout();
        Auth::guard("staff")->logout();
        Auth::guard("client")->logout();
        return redirect()->route(("homeSite"));
    }
}
