<?php

namespace App\Http\Middleware\admin;

use App\Models\Quyen_Han;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckQuyen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('admin')->check()){
            return $next($request);
        }else if(Auth::guard('staff')->check()){
            return $next($request);
        }else if(Auth::guard('client')->check()){
            abort(403, "Bạn không có quyền truy cập");
        }
        abort(403, "Bạn không có quyền truy cập");
    }
}
