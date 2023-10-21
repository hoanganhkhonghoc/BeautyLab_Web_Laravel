<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facilities;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacilitiesController extends Controller
{
    public function list(){
        $data = Facilities::where("isDeleted", "!=", 0)->get();
        return view("admin/Facilities/facilities-list", ["data" => $data]);
    }

    public function add(){
        return view("admin/Facilities/facilities-add");
    }

    public function xl_add(Request $request){
        $fac = new Facilities();
        $fac->name = $request->name;
        $fac->address = $request->address;
        $fac->created_at = Carbon::now();
        $fac->updated_at = Carbon::now();
        $fac->isDeleted = 1;
        $fac->admin_id = Auth::guard("admin")->user()->id;
        $fac->save();
        notyf()->addSuccess("Thêm cơ sở thành công");
        return redirect()->route("listFacilities");
    }

    public function edit($id){
        $data = Facilities::where("id", $id)->first();
        return view("admin/Facilities/facilities-edit", ["data" => $data]);
    }

    public function xl_edit(Request $request, $id){
        $fac = Facilities::find($id);
        $fac->update([
            "name" => $request->name,
            "address" => $request->address,
            "updated_at" => Carbon::now(),
        ]);
        $fac->save();
        notyf()->addSuccess("Sửa cơ sở thành công");
        return redirect()->route("listFacilities");
    }

    public function xl_delete($id){
        $fac = Facilities::find($id);
        $fac->update([
            "isDeleted" => 0,
        ]);
        notyf()->addSuccess("Xoá cơ sở thành công");
        return redirect()->route("listFacilities");
    }

    public function show($id){
        $data["product"] = Product::join("category","category.id","=","product.cat_id")
                                      ->join("staff","product.staff_id","=","staff.id")
                                      ->join("facilities","facilities.id", "=", "facilities_id")
                                      ->select([
                                        "product.*",
                                        "staff.email",
                                        "facilities.name",
                                        "category.nameCate"
                                      ])
                                      ->where("product.isDeleted","!=",0)->where("facilities.id", $id)
                                      ->get();

        return view("admin/Product/product-list", ["data" => $data["product"]]);
    }
}
