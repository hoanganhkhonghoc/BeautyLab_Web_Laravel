<?php

namespace App\Listeners;

use App\Events\OrderChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class NotifyOrderChanged
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }
    public function handle(OrderChanged $event)
    {
        $orderCount = $event->orderCount;
        $message = "Có đơn hàng mới";
        if (Auth::guard("admin")->check() || Auth::guard("staff")->check()) {
            // Sử dụng session để lưu trữ thông báo
            session()->flash('order_notification', $message);
            dd(12);
        }
    }
}
