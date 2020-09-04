<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [ 'id' => 1, 'name' => 'Valentino'],
            [ 'id' => 2, 'name' => 'Prada'],
            [ 'id' => 3, 'name' => 'Fendi'],
            [ 'id' => 4, 'name' => 'Stone Island'],
            [ 'id' => 5, 'name' => 'Gucci'],
            [ 'id' => 6, 'name' => 'Others'],
        );

        foreach ($data as $value) {
            DB::table('brands')->insert($value);
        }
    }
}
