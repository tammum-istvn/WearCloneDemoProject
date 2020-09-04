<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Models\User::class, 100)->create()->each(function ($user) {

            factory(App\Models\Login::class)->create(['user_id' => $user->id]);
            factory(App\Models\Address::class)->create(['user_id' => $user->id]);

            if ($user->account_type == 'shop') {
                factory(App\Models\Shop::class)->create(['user_id' => $user->id]);
            }
        });
    }
}
