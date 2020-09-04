<?php

use Illuminate\Database\Seeder;
use App\Models\Look;
use Illuminate\Support\Facades\DB;

class LookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // create a look
         factory(App\Models\Look::class, 50)
         ->create()
         ->each(function ($look) {
             factory(App\Models\LookItem::class)->create(['look_id' => $look->id]);
         });
 
    }
}
