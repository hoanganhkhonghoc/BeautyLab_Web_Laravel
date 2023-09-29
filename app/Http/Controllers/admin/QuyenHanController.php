<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facilities;
use App\Models\Quyen_Han;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuyenHanController extends Controller
{
    public function list(){
        $data = Staff::join("facilities", "facilities.id", "=", "staff.facilities_id")
                                ->select("staff.*", 'facilities.name AS fac_name')
                                ->where("staff.isDeleted", "!=", 0)
                                ->get();
        return view("admin/Quyen_han/quyen-list", ["data" => $data]);
    }
    public function show($id){
        // check xem đã tạo cột quyền chưa có rồi thì trả true còn không trả false
        $check = Quyen_Han::where("staff_id", $id)->exists();
        // ngược lại của true để tạo quyền
        if(!$check){
            $quyen = new Quyen_Han();
            $quyen->ql_binhluan = 0;
            $quyen->ql_sanpham = 0;
            $quyen->ql_donhang = 0;
            $quyen->ql_lichdattruoc = 0;
            $quyen->ql_tuyendung = 0;
            $quyen->ql_khachhang = 0;
            $quyen->ql_baiviet = 0;
            $quyen->staff_id = $id;
            $quyen->created_at = Carbon::now();
            $quyen->updated_at = Carbon::now();
            $quyen->isDeleted = 1;
            $quyen->save();
        }
        $data = Quyen_Han::where("staff_id", $id)->where("isDeleted","!=",0)->first();
        return view("admin/Quyen_han/show", ["data" => $data]);
    }
    public function xl_edit(Request $request, $id){
        if($request->binh_luan == "on"){
            $binhluan = 1;
        }else{
            $binhluan = 0;
        }
        if($request->ql_san_pham == "on"){
            $sanpham = 1;
        }else{
            $sanpham = 0;
        }
        if($request->xl_donhang == "on"){
            $donhang = 1;
        }else{
            $donhang = 0;
        }
        if($request->lich_dat_truoc == "on"){
            $lichdattruoc = 1;
        }else{
            $lichdattruoc = 0;
        }
        if($request->tuyen_dung == "on"){
            $tuyendung = 1;
        }else{
            $tuyendung = 0;
        }
        if($request->ql_khachhang == "on"){
            $khachhang = 1;
        }else{
            $khachhang = 0;
        }
        if($request->ql_baiviet == "on"){
            $baiviet = 1;
        }else{
            $baiviet = 0;
        }
        $data = Quyen_Han::find($id);
        $data->update([
            "ql_binhluan" => $binhluan,
            "ql_sanpham"  => $sanpham,
            "ql_donhang"  => $donhang,
            "ql_lichdattruoc"  => $lichdattruoc,
            "ql_tuyendung"  => $tuyendung,
            "ql_khachhang"  => $khachhang,
            "ql_baiviet"  => $baiviet,
        ]);
        $data->save();
        notyf()->addSuccess("Sửa quyền thành công");
        return redirect("admin/quyen/show/". $id);
    }
}
