<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Console\Command;

class DeleteUnpaidOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-unpaid-orders-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete orders without payments after a week';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $weekAgo = Carbon::now()->subWeek();
        $unpaidOrderIds = Payment::where('created_at', '<', $weekAgo)
            ->pluck('order_id')
            ->toArray();

        $unpaidOrders = Order::whereNotIn('id', $unpaidOrderIds)->get();
        foreach ($unpaidOrders as $order) {
            $order->delete();
        }

        $this->info('Unpaid orders after a week have been deleted.');
    }

}
