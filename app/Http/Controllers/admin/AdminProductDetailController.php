<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminProductDetailController extends Controller
{
    public function list($id){
        $data['product'] = ProductDetail::join("product", "product.id", "=", "product_detail.product_id")
                                        ->select([
                                            "product.namePro", 
                                            "product_detail.*",
                                        ])
                                        ->where("product_detail.isDeleted" , "!=", 0)
                                        ->where("product_detail.product_id", "=", $id)
                                        ->where("product_detail.isSoid", "!=", 0)
                                        ->get();
        $data['id'] = $id;
        return view("admin/Product_detail/product_detail-list", ['data' => $data]);
    }

    public function addView($id){
        $data["namePro"] = Product::where("id",$id)->first();
        $data['id'] = $id;
        return view("admin/Product_detail/product_detail-add", ["data" => $data]);
    }

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

    public function xl_delete($id){
        $product = ProductDetail::find($id);
        $product->update([
            "isDeleted" => 0,
        ]);
        $product->save();
        notyf()->addSuccess("Xoá sản phẩm thành công");
        return redirect("/admin/product_detail/list/". $id);
    }

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
