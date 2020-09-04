<?php

use App\models\OrderItem;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Order::class, 50)->create()->each(function ($order) {
            factory(App\Models\OrderItem::class, rand(1, 5))->create(['order_id' => $order->id])->each(function ($orderItem) {

                if ($orderItem->order->status == 'delivered') {
                    try{
                        factory(App\Models\ItemReview::class, 1)->create(['order_item_id' => $orderItem->id, 'item_id' => $orderItem->itemDetailInformation->itemDetail->item_id]);
                    }catch(Exception $e){
                        // dd($e);
                    }
                }
            });
        });
    }
}
