<?php

namespace App\Http\Controllers;

use App\Models\FavouriteItem;
use App\models\ItemDetail;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Item;
use App\Models\User;
use App\Utils\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemDetailController extends Controller
{
    public function show($id)
    {
        $item = Item::findorfail($id);
        // $item = Item::where('is_delete', false)->findorfail($id);

        $review = new Review($item->reviews);
        $similerItems = Item::where('is_delete', false)
            ->where('id', '!=', $item->id)
            ->where(function ($q) use ($item) {
                $q->where('sub_category_id', $item->sub_category_id);
                $q->orWhere('category_id', $item->category_id);
                $q->orWhere('brand_id', $item->brand_id);
            })->get()
            ->take(18);

        //get likes of Similer Items
        $arrayLikeOfSimilerItems = array();
        foreach ($similerItems as $similerItem) {
            $currentLikes = FavouriteItem::where('item_id', $similerItem->id)->count();
            array_push($arrayLikeOfSimilerItems, $currentLikes);
        }

        return view('item-detail')
            ->with('rating', $review->rating())
            ->with('fraction', $review->fractionalStarWidth())
            ->with('item', $item)
            ->with('similerItems', $similerItems)
            ->with('similerItemsLikes', $arrayLikeOfSimilerItems);
    }

    public function addRemoveLike(Request $request)
    {
        $favouriteItems = new FavouriteItem();
        if ($request->isInsertLikes == 'true') {
            $favouriteItems->item_id = $request->itemId;
            $favouriteItems->user_id = Auth::user()->id;
            $favouriteItems->save();
            return response()->json(array("msg" => "like inserted!"), 200);
        } else {
            FavouriteItem::where('user_id', Auth::user()->id)
                ->where('item_id', $request->itemId)
                ->delete();
            return response()->json(array("msg" => "like removed!"), 200);
        }
    }

    public function loadLike(Request $request)
    {
        $favouriteItems = new FavouriteItem();
        $likeStatus = $favouriteItems->isLikeExist($request->itemId);
        $likesCount = $favouriteItems->getLikesCount($request->itemId);
        return response()->json(array("likeStatus" => $likeStatus, "likesCount" => $likesCount), 200);
    }
}
