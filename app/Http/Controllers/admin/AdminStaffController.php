<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\Client;
use App\Models\Facilities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminStaffController extends Controller
{
    /*
    function: list (show view list manager Staff)
    @redirect: /admin/staff/list
    @methods: get
    @return: view("admin/Staff/staff-list")
    @data: all value in table Staff where isDeleted != 0
    */
    public function list(){
        $data["staff"] = Staff::join("facilities", "facilities.id", "=", "staff.facilities_id")
                                ->select([
                                    "staff.*", 
                                    'facilities.name AS fac_name',
                                ])
                                ->where("staff.isDeleted", "!=", 0)
                                ->get();
        return view("admin/Staff/staff-list", ['data' => $data]);
    }

    /*
    function: addView (show view add Staff)
    @redirect: /admin/staff/addView
    @methods: get
    @return: view("admin/Staff/staff-add")
    @data: all value in table Facilities where isDeleted != 0
    */
    public function addView(){
        $data = Facilities::where("isDeleted", "!=", 0)->get();
        return view("admin/Staff/staff-add", ["data" => $data]);
    }

    /*
    function: xl_add (logic and add value form view to database)
    @redirect: /admin/staff/xl_add
    @methods: post
    @param: Request (value to form)
    @return: redirect("/admin/staff/list")
    */
    public function xl_add(Request $request){
        if($request->pass != $request->pass1){
            notyf()->addError("Mật khẩu không trùng khớp!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addStaff");
        }
        $coutStaff = Staff::where("email", $request->email)->count();
        $coutAdmin = Admin::where("email", $request->email)->count();
        $coutClient = Client::where("email", $request->email)->count();
        if($coutStaff > 0 || $coutAdmin > 0 || $coutClient > 0){
            notyf()->addError("Email đã tồn tại!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addStaff");
        }
        $coutStaffP = Staff::where("phone", $request->phone)->count();
        $coutAdminP = Admin::where("phone", $request->phone)->count();
        $coutClientP = Client::where("phone", $request->phone)->count();
        if($coutStaffP > 0 || $coutAdminP > 0 || $coutClientP > 0){
            notyf()->addError("Số điện thoại đã tồn tại!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("addStaff");
        }

        $staff = new Staff();
        
        $staff->created_at = Carbon::now();
        $staff->updated_at = Carbon::now();
        $staff->isDeleted = 1;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->password = bcrypt($request->pass);
        $staff->address = $request->address;
        $staff->level = 2;
        $staff->facilities_id = $request->fac_id;
        $staff->sex = 1;
        $staff->save();
        notyf()->addSuccess("Thêm nhân viên thành công");
        return redirect()->route("staffList");
    }

    /*
    function: showView (show view Staff detail poperties)
    @redirect: /admin/staff/show
    @methods: get
    @param: $id (id staff table)
    @return: view("admin/Staff/staff-show")
    @data: $data[
                ['staff']: get data staff order by id staff table
                $data['fac']: get all data in facilities table
            ]
    */
    public function showView($id){
        $data['staff'] = Staff::where("id",$id)->where("isDeleted","!=",0)->first();
        $data['fac'] = Facilities::where("isDeleted", "!=", 0)->get();
        return view("admin/Staff/staff-show", ['data' => $data]);
    }

    /*
    function: xl_edit (logic and update data in Staff table order by id)
    @redirect: /admin/staff/xl_edit
    @methods: post
    @param: Request (value to form)
    @param: $id (id staff table)
    @return: redirect("/admin/staff/show/". $id)
    */
    public function xl_edit(Request $request, $id){
        $staff = Staff::find($id);
        if($staff->password != $request->pass){
            $staff->update([
                "password" => bcrypt($request->pass),
                "facilities" => $request->fac_id,
                "address" => $request->address,
                "updated_at" => Carbon::now()
            ]);
        }else{
            $staff->update([
                "name" => $request->name,
                "facilities" => $request->fac_id,
                "address" => $request->address,
                "updated_at" => Carbon::now()
            ]);
        }
        notyf()->addSuccess("Sửa nhân viên thành công");
        return redirect("/admin/staff/show/". $id);
    }

    /*
    function: xl_deleted (logic and deleted data in Staff table order by id)
    @redirect: /admin/staff/xl_deleted
    @methods: get
    @param: $id (id staff table)
    @return: redirect("/admin/staff/list")
    */
    public function xl_deleted($id){
        $staff = Staff::find($id);
        $staff->update([
            "isDeleted" => 0
        ]);
        $staff->save();
        notyf()->addSuccess("Xoá nhân viên thành công");
        return redirect("/admin/staff/list");
    }
}