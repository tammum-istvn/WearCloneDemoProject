<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create items
        factory(App\Models\Item::class, 50)
            ->create()
            ->each(function ($item) {

                // create itemDetails for each item 
                factory(App\Models\ItemDetail::class, 2)->create(['item_id' => $item->id])->each(function ($itemDetail) {
                    try {
                        factory(App\Models\ItemDetailInformation::class,2)->create(['item_detail_id' => $itemDetail->id]);
                    }catch (Exception $e) {
                        // dd($e);
                    }
                });
            });
    }
}
