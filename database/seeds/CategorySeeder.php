<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [ 'id' => 1, 'name' => 'Tops'],
            [ 'id' => 2, 'name' => 'Outerwear'],
            [ 'id' => 3, 'name' => 'Dress'],
            [ 'id' => 4, 'name' => 'Overall / Salopette'],
            [ 'id' => 5, 'name' => 'Suit / Tie'],
            [ 'id' => 6, 'name' => 'Skirts'],
            [ 'id' => 7, 'name' => 'Pants'],
            [ 'id' => 8, 'name' => 'Shoes'],
            [ 'id' => 9, 'name' => 'Socks &amp; Tights'],
            [ 'id' => 10, 'name' => 'Bags'],
            [ 'id' => 11, 'name' => 'Hats'],
            [ 'id' => 12, 'name' => 'Jewelry'],
            [ 'id' => 13, 'name' => 'Hair Accessories'],
            [ 'id' => 14, 'name' => 'Accessories'],
            [ 'id' => 15, 'name' => 'Wallets'],
            [ 'id' => 16, 'name' => 'Watches'],
            [ 'id' => 17, 'name' => 'Swimwear / Kimono'],
            [ 'id' => 18, 'name' => 'Underwear'],
            [ 'id' => 19, 'name' => 'Maternity'],
            [ 'id' => 20, 'name' => 'Beauty care / Contact lenses'],
            [ 'id' => 21, 'name' => 'Home'],
            [ 'id' => 22, 'name' => 'Kitchen'],
            [ 'id' => 23, 'name' => 'General goods'],
            [ 'id' => 24, 'name' => 'Music / Books and Magazines'],
            [ 'id' => 25, 'name' => 'Make up / Face care'],
            [ 'id' => 26, 'name' => 'Others'],

        );

        foreach ($data as $value) {
            DB::table('categories')->insert($value);
        }
    }
}
