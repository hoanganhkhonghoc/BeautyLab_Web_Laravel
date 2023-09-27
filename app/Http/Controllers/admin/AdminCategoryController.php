<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminCategoryController extends Controller
{
    public function list(){
        // kết hợp 2 bảng staff và category vào với nhau
        $category = Category::join("staff", "category.staff_id", "=", "staff.id")
                        ->select("staff.name", "category.*")
                        ->where("category.isDeleted", "!=", 0)
                        ->get();

        return view("admin/Category/category-list", ["data" => $category]);
    }

    public function add(){
        return view("admin/Category/category-add");
    }

    public function xl_add(Request $request){
        // Kiểm tra dữ liệu đầu vào (khác null, kiểu dữ liệu, giới hạn)
        $validate = $request->validate([
            "nameCate" => "required|string|max:255",
        ]);

        $category = new Category();
        $category->nameCate = $validate['nameCate'];
        if(Auth::guard("admin")->check()){
            $category->staff_id = 1;
        }else{
            $category->staff_id = Auth::guard("staff")->user()->id;
        }
        $category->created_at = Carbon::now();
        $category->updated_at = Carbon::now();
        $category->isDeleted = 1;
        $category->save();
        notyf()->addSuccess("Thêm danh mục thành công");
        return redirect()->route('listCategory');
    }

    public function xl_delete($id){
        // xoá dữ liệu database
        $category = Category::find($id);
        $category->update([
            'isDeleted' => 0,
        ]);
        $category->save();
        notyf()->addSuccess("Xoá danh mục thành công");
        return redirect()->route('listCategory');
    }

    public function edit($id){
        // lấy bản ghi Category theo id
        $category = Category::where("id", $id)->first();
        return view("admin/Category/category-edit", ['data' => $category]);
    }

    public function xl_edit(Request $request, $id){
        // kiểm tra dữ liệu đầu vào
        $validate = $request->validate([
            "nameCate" => "required|string|max:255",
        ]);
        // lấy bản ghi cần sửa
        $category = Category::find($id);
        // check xem ai là người sửa admin hay nhân viên
        if(Auth::guard("admin")->check()){
            $staff_id = 1;
        }else{
            $staff_id = Auth::guard("staff")->user()->id;
        }
        $category->update([
            "nameCate" => $validate["nameCate"],
            "staff_id" => $staff_id,
            "updated_at" => Carbon::now(),
        ]);
        $category->save();
        notyf()->addSuccess("Sửa danh mục thành công");
        return redirect()->route('listCategory');
    }
}
