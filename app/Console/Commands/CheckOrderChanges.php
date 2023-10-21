<?php

namespace App\Console\Commands;

use App\Events\OrderChanged;
use App\Models\OrderModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckOrderChanges extends Command
{
    protected $signature = 'orders:check';
    protected $description = 'Check for changes in the Order table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $previousCount = cache('order_count');
        $currentCount = OrderModel::where("isDeleted", "!=", 0)->count();

        if ($currentCount !== $previousCount) {
            event(new OrderChanged($currentCount));
        }

        Log::info('Listener NotifyOrderChanged is activated.');
        cache(['order_count' => $currentCount], now()->addSeconds(5));
    }
}
