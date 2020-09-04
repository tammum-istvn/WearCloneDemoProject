<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LoginSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(CategorySeeder::class);
       $this->call(SubCategorySeeder::class);
       $this->call(BrandSeeder::class);
//        $this->call(ColorSeeder::class);
//        $this->call(HeightSeeder::class);
//        $this->call(ProfileSeeder::class);
//        $this->call(IndividualSeeder::class);
//        $this->call(ShopSeeder::class);
//        $this->call(UserSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(LookSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderItemSeeder::class);
        $this->call(ItemReviewSeeder::class);
        $this->call(RankingSeeder::class);
        $this->call(ChannelSeeder::class);
        $this->call(MessageSeeder::class);
    }
}
