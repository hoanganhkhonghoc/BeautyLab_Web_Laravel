<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    /*
    function: list (show view list manager category)
    @redirect: /admin/category/list
    @methods: get
    @return: view("admin/Category/category-list")
    @data: all value in list category (isDelted != 0)
    */
    public function list(){
        // kết hợp 2 bảng staff và category vào với nhau
        $category = Category::join("staff", "category.staff_id", "=", "staff.id")
                        ->select([
                            "staff.name", 
                            "category.*",
                        ])
                        ->where("category.isDeleted", "!=", 0)
                        ->orderBy('category.created_at', 'desc')
                        ->get();
        return view("admin/Category/category-list", ["data" => $category]);
    }

    /*
    function: add (show view add category)
    @redirect: /admin/category/addView
    @methods: get
    @return: view("admin/Category/category-add")
    */
    public function add(){
        return view("admin/Category/category-add");
    }

    /*
    function: xl_add (logic and add value form view to database)
    @redirect: /admin/category/xl_add
    @methods: post
    @param: Request (value to form)
    @return: redirect("/admin/category/list")
    */
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

    /*
    function: xl_deleted (deleted value where id database)
    @redirect: /admin/category/xl_delete
    @methods: get
    @param: $id (id table category)
    @return: redirect("/admin/category/list")
    */
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

    /*
    function: edit (show view edit category)
    @redirect: /admin/category/editView
    @methods: get
    @param: $id (id table category)
    @return: view("admin/Category/category-edit")
    @data: get value category orderby id 
    */
    public function edit($id){
        // lấy bản ghi Category theo id
        $category = Category::where("id", $id)->first();
        return view("admin/Category/category-edit", ['data' => $category]);
    }

    /*
    function: xl_edit (logic and edit value form view to database)
    @redirect: /admin/category/xl_edit
    @methods: post
    @param: Request (value to form)
    @param: $id (id table category)
    @return: redirect("/admin/category/list")
    */
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
