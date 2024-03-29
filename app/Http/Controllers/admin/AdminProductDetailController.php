<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductDetailController extends Controller
{
    /*
    function: list (show view list product detail by id product)
    @redirect: /admin/product_detail/list
    @methods: get
    @param: $id (id product table)
    @return: view("admin/Product_detail/product_detail-list")
    @data: $data[
                ['product']: all value product detail table order by id product
                ['id']: id product prama
            ]
    */
    public function list($id){
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->select([
                                            "product.namePro", 
                                            "product_detail.*",
                                        ])
                                        ->where("product_detail.isDeleted" , "!=", 0)
                                        ->where("product_detail.product_id", "=", $id)
                                        ->where("product_detail.isSoid", "!=", 0)
                                        ->orderBy('product_detail.created_at', 'desc')
                                        ->get();
        $data['id'] = $id;
        return view("admin/Product_detail/product_detail-list", ['data' => $data]);
    }

    /*
    function: addView (show view add product detail)
    @redirect: /admin/product_detail/addView
    @methods: get
    @param: $id (id product table)
    @return: view("admin/Product_detail/product_detail-add")
    @data: $data[
                ['product']: get data product order by id
                ['id']: id product prama
            ]
    */
    public function addView($id){
        $data["namePro"] = Product::where("id",$id)->first();
        $data['id'] = $id;
        return view("admin/Product_detail/product_detail-add", ["data" => $data]);
    }

    /*
    function: xl_add (show view add product detail)
    @redirect: /admin/product_detail/xl_add
    @methods: post
    @param: Request (value to form)
    @param: $id (id product table)
    @return: redirect("/admin/product_detail/list/". $id)
    */
    public function xl_add(Request $request ,$id){
        $product_detail = new  ProductDetail();
        $product_detail->created_at = Carbon::now();
        $product_detail->updated_at = Carbon::now();

        $partImg = time() . "." . $request->imgPro->extension();
        $request->imgPro->move(public_path('img'), $partImg);
        $product_detail->img = $partImg;

        $product_detail->price = $request->price;
        $product_detail->quanity = $request->quanity;
        $product_detail->detail = $request->detail;
        $product_detail->isSoid = $this->isSoid($request->quanity);
        $product_detail->isDeleted = 1;
        $product_detail->color = $request->color;

        $product_detail->product_id = $id;

        $product_detail->save();
        notyf()->addSuccess("Thêm sản phẩm thành công");
        return redirect("/admin/product_detail/list/". $id);
    }

    /*
    function: xl_delete (logic and deleted value product detail by id)
    @redirect: /admin/product_detail/xl_delete
    @methods: get
    @param: $id (id product detail table)
    @return: redirect("/admin/product_detail/list/". $id)
    */
    public function xl_delete($id){
        $product = ProductDetail::find($id);
        $product->update([
            "isDeleted" => 0,
        ]);
        $product->save();
        notyf()->addSuccess("Xoá sản phẩm thành công");
        return redirect("/admin/product_detail/list/". $id);
    }

    /*
    function: editView (show view product detail poperties by id product detail)
    @redirect: /admin/product_detail/editView
    @methods: get
    @param: $id (id product detail table)
    @return: view("admin/Product_detail/product_detail-edit"")
    @data: $data[
                ['product']: get value product detail table order by id product detail
                ['id']: id product detail prama
            ]
    */
    public function editView($id){
        $data["product"] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                        ->select([
                            "product.namePro", 
                            "product_detail.*",
                        ])
                        ->where("product_detail.id", $id)
                        ->where("product_detail.isDeleted", "!=", 0)
                        ->first();
        $data['id'] = $id;
        return view("admin/Product_detail/product_detail-edit", ["data" => $data]);
    }

    /*
    function: xl_edit (logic and edit data in product detail order by id product detail)
    @redirect: /admin/product_detail/xl_edit
    @methods: post
    @param: Request (value to form)
    @param: $id (id product detail table)
    @return: redirect("/admin/product_detail/editView/". $id)
    */
    public function xl_edit(Request $request, $id){
        $product = ProductDetail::find($id);
        if($request->imgPro == null){
            $img = $request->img;
        }else{
            $img = time() . "." . $request->imgPro->extension();
            $request->imgPro->move(public_path('img'), $img);
        }
        $product->update([
            "updated_at" => Carbon::now(),
            "img" => $img,
            "price" => $request->price,
            "quanity" => $request->quanity,
            "color" => $request->color,
            "isSoid" => $this->isSoid($request->quanity),
        ]);

        $product->save();
        notyf()->addSuccess("Sửa sản phẩm thành công");
        return redirect("/admin/product_detail/editView/". $id);
    }

    /*
    function: show (show view product detail properties by id)
    @redirect: /admin/product_detail/show
    @methods: get
    @param: $id (id product detail table)
    @return: view("admin/Product_detail/product_detail-show")
    @data: $data['product']: get data product order by id
    */
    public function show($id){
        $data["product"] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->join("category", "category.id", "=", "product.cat_id")
                                        ->select([
                                            "product.namePro", 
                                            "product_detail.*", 
                                            "category.nameCate"
                                        ])
                                        ->where("product_detail.id", $id)
                                        ->first();
                                        // dd($data);
        return view("admin/Product_detail/product_detail-show", ["data" => $data]);
    }

    /*
    function: isSoid (get isSoid update)
    @param: $quanity (quanity product detail current)
    @return: number
    @switch(number)
            $quanity = 0: return 0
            $quanity <= 10 && $quanity > 0: return 1;
            default: return 2
    */
    public function isSoid($quanity){
        if($quanity == 0){
            return 0;
        }else if($quanity <= 10 && $quanity > 0){
            return 1;
        }else{
            return 2;
        }
    }
}
