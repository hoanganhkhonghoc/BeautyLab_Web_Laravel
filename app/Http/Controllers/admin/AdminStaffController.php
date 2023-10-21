<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Facilities;
use Illuminate\Http\Request;
use App\Models\Staff;
use Carbon\Carbon;

class AdminStaffController extends Controller
{
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

    public function addView(){
        $data = Facilities::where("isDeleted", "!=", 0)->get();
        return view("admin/Staff/staff-add", ["data" => $data]);
    }

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

    public function showView($id){
        $data['staff'] = Staff::where("id",$id)->where("isDeleted","!=",0)->first();
        $data['fac'] = Facilities::where("isDeleted", "!=", 0)->get();
        return view("admin/Staff/staff-show", ['data' => $data]);
    }

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