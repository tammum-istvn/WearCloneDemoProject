<?php

namespace App\Console\Commands;

use App\Models\FavouriteItem;
use App\Models\FavouriteLooks;
use App\Models\Item;
use App\Models\Look;
use App\models\Ranking;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertRank extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:ranking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert into ranking table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private $lookPoint = 1;
    private $likePoint = 3;

    private $itemPoint = 1;
    private $itemUsagePoint = 2;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // delete all old ranking
        $ranks = Ranking::all();
        foreach ($ranks as $rank) {
            $rank->delete();
        }

        $this->generateUserRanking();
        $this->generateShopRanking();
    }

    /**
     * Generate ranking for user
     */
    private function generateUserRanking()
    {
        $users = User::where('account_type', 'individual')->get();

        foreach ($users as $user) {
            $looks = Look::where([
                ['user_id', $user->id],
                ['is_delete', false]
            ])->pluck('id');
            $totalLook = $looks->count();
            $totalLike = FavouriteLooks::whereIn('look_id', $looks)->count();

            Ranking::create([
                'user_id'   => $user->id,
                'point'     => $this->calculateUserPoint($totalLook, $totalLike),
            ]);
        }
    }

    /**
     * Shop ranking generate
     */
    private function generateShopRanking()
    {
        $users = User::where('account_type', 'shop')->get();

        foreach ($users as $user) {
            $items = Item::where([
                ['user_id', $user->id],
                ['is_delete', false]
            ])->pluck('id');
            $totalItem = $items->count();
            $totalLike = FavouriteItem::whereIn('item_id', $items)->count();

            Ranking::create([
                'user_id'   => $user->id,
                'point'     => $this->calculateShopPoint($totalItem, $totalLike),
            ]);
        }
    }

    /**
     * Calculate user point
     */
    private function calculateUserPoint($totalLook, $totalLike)
    {
        return ($totalLook * $this->lookPoint) + ($totalLike * $this->likePoint);
    }

    /**
     * Calcualte shop point
     */
    private function calculateShopPoint($totalItem, $totalLike)
    {
        return ($totalItem * $this->itemPoint) + ($totalLike * $this->likePoint);
    }
}
