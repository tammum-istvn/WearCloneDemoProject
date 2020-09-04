<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\FavouriteItem;
use App\Models\Look;
use App\models\LookItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\User;
use App\Models\Item;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    private function findProfile($userId)
    {
        return User::where([
                ['id', $userId],
                ['account_type', 'shop']
                ])->firstOrFail();
    }
    private function findItems($userId)
    {
        return Item::where('user_id', $userId)
            ->where('is_delete', false)
            ->get();
    }
    private function findTop6Brands($items)
    {
        $top6Brands = array();
        $arrayBrandsUsed = array();
        foreach ($items as $item) {
            array_push($arrayBrandsUsed, $item->brand_id);
        }
        $arrayBrandsUsed = array_count_values($arrayBrandsUsed);
        arsort($arrayBrandsUsed);
        foreach ($arrayBrandsUsed as $key => $value) {
            $currentBrand = Brand::where('id', $key)->get();
            array_push($top6Brands, $currentBrand[0]);
        }
        return $top6Brands;
    }
    private function findUsersUsingItems($items)
    {
        $usersList = array();
        $arrayUsersId = array();
        $arrayOfItemDetailInformation = array();
        foreach ($items as $item) {
            foreach ($item->details as $itemDetail) {
                foreach ($itemDetail->informations as $itemDetailInformation) {
                    array_push($arrayOfItemDetailInformation, $itemDetailInformation->id);
                }
            }
        }
        $lookItems = LookItem::where('is_delete', false)
            ->whereIn('item_detail_information_id', $arrayOfItemDetailInformation)
            ->get();
        foreach ($lookItems as $lookItem) {
            array_push($arrayUsersId, $lookItem->look->user_id);
        }
        $arrayUsersId = array_unique($arrayUsersId);
        $usersList = User::whereIn('id', $arrayUsersId)->get();
        return $usersList;
    }

    public function show($user_id)
    {
        $items = $this->findItems($user_id);
        $profile = $this->findProfile($user_id);
        $top6Brands = $this->findTop6Brands($items);
        $usersList = $this->findUsersUsingItems($items);
        return view('dashboard.shop.items-list')
            ->with('profile', $profile)
            ->with('items', $items)
            ->with('totalUsers', count($usersList))
            ->with('top6Brands', $top6Brands);
    }

    public function showUser($user_id)
    {
        $items = $this->findItems($user_id);
        $profile = $this->findProfile($user_id);
        $top6Brands = $this->findTop6Brands($items);
        $usersList = $this->findUsersUsingItems($items);
        return view('dashboard.shop.users-list')
            ->with('profile', $profile)
            ->with('items', $items)
            ->with('usersList', $usersList)
            ->with('top6Brands', $top6Brands);
    }

    public function showStaff($user_id)
    {
        $items = $this->findItems($user_id);
        $profile = $this->findProfile($user_id);
        $top6Brands = $this->findTop6Brands($items);
        $usersList = $this->findUsersUsingItems($items);
        return view('dashboard.shop.staff-list')
            ->with('profile', $profile)
            ->with('items', $items)
            ->with('totalUsers', count($usersList))
            ->with('top6Brands', $top6Brands);
    }
}
