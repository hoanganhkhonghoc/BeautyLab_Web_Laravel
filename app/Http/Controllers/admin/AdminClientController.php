<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminClientController extends Controller
{
    /*
    function: list (show view list manager Client)
    @redirect: /admin/client/list
    @methods: get
    @return: view("admin/Client/client-list")
    @data: all value in table Client where isDeleted != 0
    */
    public function list(){
        $data = Client::where("isDeleted", "!=", 0)->get();
        return view("admin/Client/client-list", ['data' => $data]);
    }

    /*
    function: addView (show view add client)
    @redirect: /admin/client/addView
    @methods: get
    @return: view("admin/Client/client-add")
    */
    public function addView(){
        return view("admin/Client/client-add");
    }

    /*
    function: xl_add (logic and add value form view to database)
    @redirect: /admin/client/xl_add
    @methods: post
    @param: Request (value to form)
    @return: redirect("/admin/client/list")
    */
    public function xl_add(Request $request){
        if($request->pass != $request->pass1){
            notyf()->addError("Mật khẩu không trùng khớp!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("clientAdd");
        }
        $coutStaff = Staff::where("email", $request->email)->count();
        $coutAdmin = Admin::where("email", $request->email)->count();
        $coutClient = Client::where("email", $request->email)->count();
        if($coutStaff > 0 || $coutAdmin > 0 || $coutClient > 0){
            notyf()->addError("Email đã tồn tại!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("clientAdd");
        }
        $coutStaffP = Staff::where("phone", $request->phone)->count();
        $coutAdminP = Admin::where("phone", $request->phone)->count();
        $coutClientP = Client::where("phone", $request->phone)->count();
        if($coutStaffP > 0 || $coutAdminP > 0 || $coutClientP > 0){
            notyf()->addError("Số điện thoại đã tồn tại!! Yêu cầu nhập lại!! =)))");
            return redirect()->route("clientAdd");
        }

        $client = new Client();
        
        $client->created_at = Carbon::now();
        $client->updated_at = Carbon::now();
        $client->isDeleted = 1;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->password = bcrypt($request->pass);
        $client->address = $request->address;
        $client->level = 3;
        $client->sex = $request->sex;
        $client->admin_id = 1;
        $client->save();
        notyf()->addSuccess("Thêm khách hàng thành công");
        return redirect()->route("clientList");
    }

    /*
    function: show (show view show detail poperties client)
    @redirect: /admin/client/show
    @methods: get
    @param: $id (id table client)
    @return: view("admin/Client/client-show")
    @data: get value client orderby id 
    */
    public function show($id){
        $data = Client::where("id", $id)->where("isDeleted", "!=", 0)->first();
        return view("admin/Client/client-show" , ["data" => $data]);
    }

    /*
    function: xl_edit (logic and edit value form view to database)
    @redirect: /admin/client/xl_edit
    @methods: post
    @param: Request (value to form)
    @param: $id (id table client)
    @return: redirect("/admin/client/show" . $id)
    */
    public function xl_edit(Request $request, $id){
        $client = Client::find($id);
        if($client->password != $request->pass){
            $client->update([
                "password" => bcrypt($request->pass),
                "address" => $request->address,
                "updated_at" => Carbon::now()
            ]);
        }else{
            $client->update([
                "name" => $request->name,
                "address" => $request->address,
                "updated_at" => Carbon::now()
            ]);
        }
        notyf()->addSuccess("Sửa khách hàng thành công");
        return redirect("/admin/client/show/". $id);
    }

    /*
    function: xl_deleted (logic and deleted value form view to database)
    @redirect: /admin/client/xl_deleted
    @methods: get
    @param: $id (id table client)
    @return: redirect("/admin/client/list")
    */
    public function xl_deleted($id){
        $client = Client::find($id);
        $client->update([
            "isDeleted" => 0
        ]);
        $client->save();
        notyf()->addSuccess("Xoá khách hàng thành công");
        return redirect("/admin/client/list");
    }
}
