<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Facilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class FacilitiesController extends Controller
{
    /*
    function: list (show view list manager Facilities)
    @redirect: /admin/facilities/list
    @methods: get
    @return: view("admin/Facilities/facilities-list")
    @data: get all data in facitilies table and isDeleted != 0
    */
    public function list(){
        $data = Facilities::where("isDeleted", "!=", 0)->get();
        return view("admin/Facilities/facilities-list", ["data" => $data]);
    }

    /*
    function: add (show view add Facilities)
    @redirect: /admin/facilities/addView
    @methods: get
    @return: view("admin/Facilities/facilities-add")
    */
    public function add(){
        return view("admin/Facilities/facilities-add");
    }

    /*
    function: xl_add (logic and add value form view to database)
    @redirect: /admin/baiviet/xl_add
    @methods: post
    @param: Request (value to form)
    @return: redirect("/admin/facilities/list")
    */
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

    /*
    function: edit (show view edit Facilities)
    @redirect: /admin/facilities/editView
    @methods: get
    @param: $id (id facitilies table)
    @return: view("admin/Facilities/facilities-edit")
    @data: get all data facilities table where isDeleted != 0
    */
    public function edit($id){
        $data = Facilities::where("id", $id)->first();
        return view("admin/Facilities/facilities-edit", ["data" => $data]);
    }

    /*
    function: xl_edit (logic and edit value form view to database)
    @redirect: /admin/facilities/xl_edit
    @methods: post
    @param: Request (value to form)
    @param: $id (id facitilies table)
    @return: redirect("/admin/facilities/list")
    */
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

    /*
    function: xl_delete (logic and delete value form view to database)
    @redirect: /admin/facilities/xl_delete
    @methods: get
    @param: $id (id facitilies table)
    @return: redirect("/admin/facilities/list")
    */
    public function xl_delete($id){
        $fac = Facilities::find($id);
        $fac->update([
            "isDeleted" => 0,
        ]);
        notyf()->addSuccess("Xoá cơ sở thành công");
        return redirect()->route("listFacilities");
    }

    /*
    function: show (show view list product in Facilities)
    @redirect: /admin/facilities/show
    @methods: get
    @param: $id (id facitilies table)
    @return: view("admin/Product/product-list")
    @data: get all data product in facitilies table where product.isDeleted != 0
    */
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
