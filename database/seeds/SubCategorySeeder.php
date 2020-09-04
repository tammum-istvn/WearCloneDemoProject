<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [ 'category_id' => 1, 'name' => 'T Shirts'],
            [ 'category_id' => 1, 'name' => 'Shirts'],
            [ 'category_id' => 1, 'name' => 'Polo'],
            [ 'category_id' => 1, 'name' => 'Knitwear'],
            [ 'category_id' => 1, 'name' => 'Vest'],
            [ 'category_id' => 1, 'name' => 'Hoodies'],
            [ 'category_id' => 1, 'name' => 'Sweatshirt'],
            [ 'category_id' => 1, 'name' => 'Cardigan'],
            [ 'category_id' => 1, 'name' => 'Ensemble'],
            [ 'category_id' => 1, 'name' => 'Jersey'],
            [ 'category_id' => 1, 'name' => 'Tank tops'],
            [ 'category_id' => 1, 'name' => 'Camisole'],
            [ 'category_id' => 1, 'name' => 'Tube tops'],
            [ 'category_id' => 1, 'name' => 'Other tops'],

            [ 'category_id' => 2, 'name' => 'Tailored jacket'],
            [ 'category_id' => 2, 'name' => 'Collarless jacket'],
            [ 'category_id' => 2, 'name' => 'Denim jacket'],
            [ 'category_id' => 2, 'name' => 'Riders jacket'],
            [ 'category_id' => 2, 'name' => 'Blouson'],
            [ 'category_id' => 2, 'name' => 'Coverall'],
            [ 'category_id' => 2, 'name' => 'Military jacket'],
            [ 'category_id' => 2, 'name' => 'Bomber jacket'],
            [ 'category_id' => 2, 'name' => 'Down vest'],
            [ 'category_id' => 2, 'name' => 'Down Jacket / Coat'],
            [ 'category_id' => 2, 'name' => 'Duffle coat'],
            [ 'category_id' => 2, 'name' => 'Mod Coat'],
            [ 'category_id' => 2, 'name' => 'Peacoat'],
            [ 'category_id' => 2, 'name' => 'Bal collar coat'],
            [ 'category_id' => 2, 'name' => 'Trenchcoat'],
            [ 'category_id' => 2, 'name' => 'Overcoat'],
            [ 'category_id' => 2, 'name' => 'Sheepskin coat'],
            [ 'category_id' => 2, 'name' => 'Nylon jacket'],
            [ 'category_id' => 2, 'name' => 'Parka'],
            [ 'category_id' => 2, 'name' => 'Baseball jacket'],
            [ 'category_id' => 2, 'name' => 'Japanese embroidered jacket'],
            [ 'category_id' => 2, 'name' => 'Poncho'],
            [ 'category_id' => 2, 'name' => 'Other outerwear'],

            [ 'category_id' => 3, 'name' => 'One piece dress'],
            [ 'category_id' => 3, 'name' => 'Shirt dress'],
            [ 'category_id' => 3, 'name' => 'Pinafore dress'],
            [ 'category_id' => 3, 'name' => 'Tunic'],
            [ 'category_id' => 3, 'name' => 'Dress'],
            
            [ 'category_id' => 4, 'name' => 'Salopette'],
            [ 'category_id' => 4, 'name' => 'Overall'],

            [ 'category_id' => 5, 'name' => 'Jacket (Suit)'],
            [ 'category_id' => 5, 'name' => 'Vest (Suit)'],
            [ 'category_id' => 5, 'name' => 'Trousers(Suit)'],
            [ 'category_id' => 5, 'name' => 'Skirt (Suit)'],
            [ 'category_id' => 5, 'name' => 'Set up'],
            [ 'category_id' => 5, 'name' => 'Tie'],
            [ 'category_id' => 5, 'name' => 'Bow-tie'],
            [ 'category_id' => 5, 'name' => 'Tiepin'],
            [ 'category_id' => 5, 'name' => 'Cuff links'],

            [ 'category_id' => 6, 'name' => 'Skirt'],
            [ 'category_id' => 6, 'name' => 'Denim skirt'],

            [ 'category_id' => 7, 'name' => 'Denim pants'],
            [ 'category_id' => 7, 'name' => 'Cargo trousers'],
            [ 'category_id' => 7, 'name' => 'Chinos'],
            [ 'category_id' => 7, 'name' => 'Trousers'],
            [ 'category_id' => 7, 'name' => 'Pants'],
            
            [ 'category_id' => 8, 'name' => 'Sneakers'],
            [ 'category_id' => 8, 'name' => 'Slip-ons'],
            [ 'category_id' => 8, 'name' => 'Sandals'],
            [ 'category_id' => 8, 'name' => 'Pumps'],
            [ 'category_id' => 8, 'name' => 'Boots'],
            [ 'category_id' => 8, 'name' => 'Booty'],
            [ 'category_id' => 8, 'name' => 'Dress shoes'],
            [ 'category_id' => 8, 'name' => 'Ballet shoes'],
            [ 'category_id' => 8, 'name' => 'Loafers'],
            [ 'category_id' => 8, 'name' => 'Deck shoes'],
            [ 'category_id' => 8, 'name' => 'Rain shoes'],
            [ 'category_id' => 8, 'name' => 'Flipflops'],
            [ 'category_id' => 8, 'name' => 'Other Shoes'],
            [ 'category_id' => 8, 'name' => 'Shoes accessories'],

            [ 'category_id' => 9, 'name' => 'Socks'],
            [ 'category_id' => 9, 'name' => 'Tights'],
            [ 'category_id' => 9, 'name' => 'Leggings'],
            [ 'category_id' => 9, 'name' => 'leg warmer'],

            [ 'category_id' => 10, 'name' => 'Shoulderbag'],
            [ 'category_id' => 10, 'name' => 'Tote'],
            [ 'category_id' => 10, 'name' => 'Backpack'],
            [ 'category_id' => 10, 'name' => 'Boston bag'],
            [ 'category_id' => 10, 'name' => 'Fannypack'],
            [ 'category_id' => 10, 'name' => 'Handbag'],
            [ 'category_id' => 10, 'name' => 'Clutch'],
            [ 'category_id' => 10, 'name' => 'Messenger bag'],
            [ 'category_id' => 10, 'name' => 'Briefcase'],
            [ 'category_id' => 10, 'name' => 'Luggage'],
            [ 'category_id' => 10, 'name' => 'Drum bag'],
            [ 'category_id' => 10, 'name' => 'Eco bag'],
            [ 'category_id' => 10, 'name' => 'Straw bag'],
            [ 'category_id' => 10, 'name' => 'School backpack'],

            [ 'category_id' => 11, 'name' => 'Cap'],
            [ 'category_id' => 11, 'name' => 'Hat'],
            [ 'category_id' => 11, 'name' => 'Beanie'],
            [ 'category_id' => 11, 'name' => 'Hunting Cap / Beret'],
            [ 'category_id' => 11, 'name' => 'Casquette'],
            [ 'category_id' => 11, 'name' => 'Visor'],

            [ 'category_id' => 12, 'name' => 'Necklace'],
            [ 'category_id' => 12, 'name' => 'Ring'],
            [ 'category_id' => 12, 'name' => 'Pierces (both ears)'],
            [ 'category_id' => 12, 'name' => 'Pierce (one ear)'],
            [ 'category_id' => 12, 'name' => 'Earring(both ears)'],
            [ 'category_id' => 12, 'name' => 'Earring(one ear)'],
            [ 'category_id' => 12, 'name' => 'Bangle / Wristband'],
            [ 'category_id' => 12, 'name' => 'Anklet'],
            [ 'category_id' => 12, 'name' => 'Choker'],
            [ 'category_id' => 12, 'name' => 'Brooch / Corsage'],
            [ 'category_id' => 12, 'name' => 'Charm'],

            [ 'category_id' => 13, 'name' => 'Hair elastic'],
            [ 'category_id' => 13, 'name' => 'Hairband'],
            [ 'category_id' => 13, 'name' => 'Headband'],
            [ 'category_id' => 13, 'name' => 'Hair clips'],
            [ 'category_id' => 13, 'name' => 'Hair pin'],
            [ 'category_id' => 13, 'name' => 'Scrunchie'],
            [ 'category_id' => 13, 'name' => 'Other hair accessories'],
            [ 'category_id' => 13, 'name' => 'Wig'],

            [ 'category_id' => 14, 'name' => 'Stole / Snood'],
            [ 'category_id' => 14, 'name' => 'Scarf'],
            [ 'category_id' => 14, 'name' => 'Belt'],
            [ 'category_id' => 14, 'name' => 'Suspender'],
            [ 'category_id' => 14, 'name' => 'Sunglasses'],
            [ 'category_id' => 14, 'name' => 'Glasses'],
            [ 'category_id' => 14, 'name' => 'Gloves'],
            [ 'category_id' => 14, 'name' => 'Neck warmer'],
            [ 'category_id' => 14, 'name' => 'Ear Warmer'],
            [ 'category_id' => 14, 'name' => 'Umbrella'],
            [ 'category_id' => 14, 'name' => 'Folding umbrella'],
            [ 'category_id' => 14, 'name' => 'Rain coat / Poncho'],
            [ 'category_id' => 14, 'name' => 'Detachable collar'],

            [ 'category_id' => 15, 'name' => 'Wallet'],
            [ 'category_id' => 15, 'name' => 'Coin case'],
            [ 'category_id' => 15, 'name' => 'Business card case'],
            [ 'category_id' => 15, 'name' => 'Porch'],
            [ 'category_id' => 15, 'name' => 'Hand mirror'],
            [ 'category_id' => 15, 'name' => 'Hand towels'],
            [ 'category_id' => 15, 'name' => 'Scarves / Wraps'],
            [ 'category_id' => 15, 'name' => 'Key holder'],
            [ 'category_id' => 15, 'name' => 'Key case'],
            [ 'category_id' => 15, 'name' => 'Wallet chain'],
            [ 'category_id' => 15, 'name' => 'Pass case'],
            [ 'category_id' => 15, 'name' => 'Card case'],
            [ 'category_id' => 15, 'name' => 'Passport case'],
            [ 'category_id' => 15, 'name' => 'Paper fan'],
            [ 'category_id' => 15, 'name' => 'Other accessories'],

            [ 'category_id' => 16, 'name' => 'Watch'],
            [ 'category_id' => 16, 'name' => 'Clock'],
            [ 'category_id' => 16, 'name' => 'Wall clock'],

            [ 'category_id' => 17, 'name' => 'Swimwear'],
            [ 'category_id' => 17, 'name' => 'Rash guard'],
            [ 'category_id' => 17, 'name' => 'Kimono'],
            [ 'category_id' => 17, 'name' => 'Swim goods'],
            [ 'category_id' => 17, 'name' => 'Yukata'],
            [ 'category_id' => 17, 'name' => 'Japanese goods'],
           
            [ 'category_id' => 18, 'name' => 'Bra'],
            [ 'category_id' => 18, 'name' => 'Briefs & Thongs'],
            [ 'category_id' => 18, 'name' => 'Bra / Shorts'],
            [ 'category_id' => 18, 'name' => 'Trunks'],
            [ 'category_id' => 18, 'name' => 'Boxer pants'],
            [ 'category_id' => 18, 'name' => 'Room wear'],
            [ 'category_id' => 18, 'name' => 'Other underwears'],
            
            [ 'category_id' => 19, 'name' => 'Maternity wear'],
            [ 'category_id' => 19, 'name' => 'Maternity goods'],
            [ 'category_id' => 19, 'name' => 'Maternity health record book cover'],
            [ 'category_id' => 19, 'name' => 'Pouch'],
            [ 'category_id' => 19, 'name' => 'Bib'],
            [ 'category_id' => 19, 'name' => 'Rompers'],
            [ 'category_id' => 19, 'name' => 'Underwear'],
            [ 'category_id' => 19, 'name' => 'swaddle'],
            [ 'category_id' => 19, 'name' => 'Baby goods'],
            [ 'category_id' => 19, 'name' => 'Tableware'],
            [ 'category_id' => 19, 'name' => 'Baby buggy'],
            [ 'category_id' => 19, 'name' => 'Baby shoes'],
            [ 'category_id' => 19, 'name' => 'Baby gift'],

            [ 'category_id' => 20, 'name' => 'Fragrance'],
            [ 'category_id' => 20, 'name' => 'Contact lenses / Colored contact lenses'],
            [ 'category_id' => 20, 'name' => 'Body creams'],
            [ 'category_id' => 20, 'name' => 'Body scrubs / Body peels'],
            [ 'category_id' => 20, 'name' => 'Sunscreens'],
            [ 'category_id' => 20, 'name' => 'Hand creams'],
            [ 'category_id' => 20, 'name' => 'Shampoos'],
            [ 'category_id' => 20, 'name' => 'Conditioners / Treatments'],
            [ 'category_id' => 20, 'name' => 'Styling products / Styling waxes'],
            [ 'category_id' => 20, 'name' => 'Soap / Body Soap'],
            [ 'category_id' => 20, 'name' => 'Bath powder'],
            [ 'category_id' => 20, 'name' => 'Oral Care'],
            [ 'category_id' => 20, 'name' => 'Other beauty products / tools'],

            [ 'category_id' => 21, 'name' => 'Cushion / Cushion cover'],
            [ 'category_id' => 21, 'name' => 'Slippers '],
            [ 'category_id' => 21, 'name' => 'Face towels'],
            [ 'category_id' => 21, 'name' => 'Bath towels'],
            [ 'category_id' => 21, 'name' => 'Candle'],
            [ 'category_id' => 21, 'name' => 'Room Fragrance'],
            [ 'category_id' => 21, 'name' => 'Interior accessories'],
            [ 'category_id' => 21, 'name' => 'Photo frame'],
            [ 'category_id' => 21, 'name' => 'Flower vase'],
            [ 'category_id' => 21, 'name' => 'Bed linens'],
            [ 'category_id' => 21, 'name' => 'Rag'],
            [ 'category_id' => 21, 'name' => 'Blankets'],
            [ 'category_id' => 21, 'name' => 'Storage'],
            [ 'category_id' => 21, 'name' => 'Trash can'],
            [ 'category_id' => 21, 'name' => 'Lightings'],
            [ 'category_id' => 21, 'name' => 'Furniture'],
            [ 'category_id' => 21, 'name' => 'PC accessories'],
            [ 'category_id' => 21, 'name' => 'Audio'],
            [ 'category_id' => 21, 'name' => 'Mirror'],
            [ 'category_id' => 21, 'name' => 'Bath / Toilet goods'],
            [ 'category_id' => 21, 'name' => 'Laundry goods'],
            
            [ 'category_id' => 22, 'name' => 'Kitchen ware'],
            [ 'category_id' => 22, 'name' => 'Glass / cups / tumbler'],
            [ 'category_id' => 22, 'name' => 'Cutlery'],
            [ 'category_id' => 22, 'name' => 'Kitchen tool'],
            [ 'category_id' => 22, 'name' => 'Apron'],
            [ 'category_id' => 22, 'name' => 'Kitchen electronics'],

            [ 'category_id' => 23, 'name' => 'Pen'],
            [ 'category_id' => 23, 'name' => 'Notes'],
            [ 'category_id' => 23, 'name' => 'Sticker / Tape'],
            [ 'category_id' => 23, 'name' => 'Mobile phone case'],
            [ 'category_id' => 23, 'name' => 'Mobile accessories'],
            [ 'category_id' => 23, 'name' => 'Toys'],
            [ 'category_id' => 23, 'name' => 'Figures'],
            [ 'category_id' => 23, 'name' => 'Badges'],
            [ 'category_id' => 23, 'name' => 'Ashtray / lighter'],
            [ 'category_id' => 23, 'name' => 'Poster / Art'],
            [ 'category_id' => 23, 'name' => 'Sports goods'],
            [ 'category_id' => 23, 'name' => 'Golf goods'],
            [ 'category_id' => 23, 'name' => 'Camera / Camera goods'],
            [ 'category_id' => 23, 'name' => 'Pet accessories'],
            [ 'category_id' => 23, 'name' => 'Travel goods'],
            [ 'category_id' => 23, 'name' => 'costume / party goods'],
            [ 'category_id' => 23, 'name' => 'Other goods'],

            [ 'category_id' => 24, 'name' => 'CD'],
            [ 'category_id' => 24, 'name' => 'DVD'],
            [ 'category_id' => 24, 'name' => 'Record'],
            [ 'category_id' => 24, 'name' => 'Book'],
            [ 'category_id' => 24, 'name' => 'Magazines'],

            [ 'category_id' => 25, 'name' => 'Skin lotions'],
            [ 'category_id' => 25, 'name' => 'Milky lotions'],
            [ 'category_id' => 25, 'name' => 'Essences / Oils / Creams'],
            [ 'category_id' => 25, 'name' => 'Eyelashes / Eye care'],
            [ 'category_id' => 25, 'name' => 'Face packs / Face masks'],
            [ 'category_id' => 25, 'name' => 'Face washes'],
            [ 'category_id' => 25, 'name' => 'Cleansers'],
            [ 'category_id' => 25, 'name' => 'Face scrubs / Face peels'],
            [ 'category_id' => 25, 'name' => 'Makeup kits / Gift sets'],
            [ 'category_id' => 25, 'name' => 'Foundations'],
            [ 'category_id' => 25, 'name' => 'Face powders'],
            [ 'category_id' => 25, 'name' => 'Makeup primers / Concealers'],
            [ 'category_id' => 25, 'name' => 'Lipsticks / Lipbalms / Lipglosses'],
            [ 'category_id' => 25, 'name' => 'Blushes / Highlighters'],
            [ 'category_id' => 25, 'name' => 'Eyebrows'],
            [ 'category_id' => 25, 'name' => 'Eyeshadows'],
            [ 'category_id' => 25, 'name' => 'Eyeliners'],
            [ 'category_id' => 25, 'name' => 'Mascaras'],
            [ 'category_id' => 25, 'name' => 'Nail polishes / Nail care'],
            [ 'category_id' => 25, 'name' => 'Make-up goods'],
            [ 'category_id' => 25, 'name' => 'beauty equipment'],

            [ 'category_id' => 26, 'name' => 'Grab bag'],
            [ 'category_id' => 26, 'name' => 'Wrapping items'],
            [ 'category_id' => 26, 'name' => 'measurement suit'],
            [ 'category_id' => 26, 'name' => 'Others'],
        );

        foreach ($data as $value) {
            DB::table('sub_categories')->insert($value);
        }
    }
}