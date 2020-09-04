<?php

use Illuminate\Database\Seeder;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Login::create([
        //     'user_id'=>'1',
        //     'email'=>'test1@gmail.com',
        //     'email_verified_at'=>'2020-05-04 04:05:48',
        //     'password'=>Hash::make('12345678')
        // ]);
        // Login::create([
        //     'user_id'=>'2',
        //     'email'=>'test2@gmail.com',
        //     'email_verified_at'=>'2020-05-04 04:05:48',
        //     'password'=>Hash::make('12345678')
        // ]);

        factory(App\Models\Look::class)->create();
    }
}
