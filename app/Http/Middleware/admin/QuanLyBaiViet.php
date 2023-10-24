<?php

namespace App\Http\Middleware\admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class QuanLyBaiViet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard("admin")->check()){
            return $next($request);
        }else if(Auth::guard("staff")->check()){
            if(Session::has("QuyenHan")){
                if(Session::get("QuyenHan")->ql_baiviet == 1){
                    return $next($request);
                }
            }
        }
        abort(403, "Bạn không có quyền vào đây");
    }
}
