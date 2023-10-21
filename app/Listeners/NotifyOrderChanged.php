<?php

namespace App\Listeners;

use App\Events\OrderChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        Log::info('Listener NotifyOrderChanged is activated.');
        if (Auth::guard("admin")->check() || Auth::guard("staff")->check()) {
            // Sử dụng session để lưu trữ thông báo
            session()->flash('order_notification', $message);
        }
    }
}
