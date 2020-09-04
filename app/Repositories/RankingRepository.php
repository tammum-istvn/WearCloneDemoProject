<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\Look;
use App\Models\Ranking;
use App\Repositories\RankingRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RankingRepository implements RankingRepositoryInterface
{
    /**
     * RETURN user rank data
     */
    public function user($gender)
    {
        $ranks = Ranking::leftJoin("users", 'rankings.user_id', '=', "users.id")
            ->leftJoin("addresses", 'users.id', '=', "addresses.user_id")
            ->leftJoin(
                DB::raw('(select COUNT(looks.id) as look_count,
                    looks.user_id from looks group by user_id) as look_count_by_user'),
                'users.id',
                '=',
                'look_count_by_user.user_id'
            )
            ->where([
                ["users.gender", $gender],
                ["users.account_type", "individual"],
            ])
            ->orderBy('rankings.point', 'desc')
            ->select("rankings.*", "users.*", "addresses.city", "look_count_by_user.look_count")
            ->limit(100)
            ->get();

        foreach ($ranks as $index => $rank) {
            if ($index >= 10) {
                break;
            }

            $ranks[$index]->looks = $this->recentLooks($rank->user_id);
        }
        return $ranks;
    }

    /**
     * Shop ranking
     */
    public function shop()
    {
        $ranks = DB::table('rankings')
            ->leftJoin("users", 'rankings.user_id', '=', "users.id")
            ->leftJoin("addresses", 'users.id', '=', "addresses.user_id")
            ->leftJoin(
                DB::raw('(select COUNT(followers.follower_id) as follower_count,
        followers.user_id from followers group by followers.user_id) as follower_count_by_shop'),
                'users.id',
                '=',
                'follower_count_by_shop.user_id'
            )
            ->where("users.account_type", "shop")
            ->orderBy('rankings.point', 'desc')
            ->select("rankings.*", "users.*", "addresses.city", "follower_count_by_shop.follower_count")
            ->limit(100)
            ->get();

        foreach ($ranks as $index => $rank) {
            if ($index >= 10) {
                break;
            }

            $ranks[$index]->items = $this->topItems($rank->user_id);
        }
        return $ranks;
    }

    /**
     * User recently posted look
     */
    private function recentLooks($user_id)
    {
        return Look::where(
            [
                ['user_id', $user_id],
                ['is_delete', false]
            ]
        )
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }

    /**
     * Top three items of shop
     */
    private function topItems($user_id)
    {
        return Item::where(
            [
                ['items.user_id', $user_id],
                ['items.is_delete', false]
            ]
        )
            ->leftJoin('favourite_items', 'items.id', 'favourite_items.item_id')
            ->leftJoin('item_details', function ($q) {
                $q->on('items.id', 'item_details.item_id');
                $q->where('item_details.is_delete', 'false');
            })
            ->selectRaw('
                items.*, 
                count(favourite_items.item_id) favourit_count, 
                json_extract( item_details.picture, "$[0]") picture
            ')
            ->groupBy('items.id')
            ->orderBy('favourit_count', 'desc')
            ->limit(3)
            ->get();
    }
}
