<?php

namespace App\Http\Controllers\Dashboard\Individual;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\FavouriteLooks;
use App\Models\Follower;
use App\models\LookItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Look;
use App\Models\User;

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
            ['account_type', 'individual']
        ])->firstOrFail();
    }
    private function findLooks($userId)
    {
        return Look::where([
            ['user_id', $userId],
            ['is_delete', false],
        ])->get();
    }
    private function findFollowers($userId)
    {
        $followerList = array();
        $followers = Follower::where('user_id', $userId)->get();
        foreach ($followers as $follower) {
            $currentFollower = User::where('id', $follower->follower_id)->get();
            array_push($followerList, $currentFollower);
        }
        return $followerList;
    }
    private function findFollowings($userId)
    {
        $followingList = array();
        $followings = Follower::where('follower_id', $userId)->get();
        foreach ($followings as $following) {
            $currentFollowing = User::where('id', $following->user_id)->get();
            array_push($followingList, $currentFollowing);
        }
        return $followingList;
    }
    private function findTop6Brands($looks)
    {
        $top6Brands = array();
        $arrayBrandsUsed = array();
        foreach ($looks as $look) {
            foreach ($look->items as $lookItem) {
                $currentBrandId = optional($lookItem->itemDetailInformation->itemDetail->item->brand)->id;
                array_push($arrayBrandsUsed, $currentBrandId);
            }
        }
        $arrayBrandsUsed = array_count_values($arrayBrandsUsed);
        arsort($arrayBrandsUsed);
        foreach ($arrayBrandsUsed as $key => $value) {
            $currentBrand = Brand::where('id', $key)->get();
            array_push($top6Brands, $currentBrand[0]);
        }
        return $top6Brands;
    }
    private function findLikedLooks($userId)
    {
        $arrLikedLook = array();
        $likedLooks =  FavouriteLooks::where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->get();
        foreach ($likedLooks as $likedLook) {
            $currentLook = Look::where([
                ['is_delete', false],
                ['id', $likedLook->look_id]
            ])->get();
            array_push($arrLikedLook, $currentLook[0]);
        }
//        dd($arrLikedLook);
        return $arrLikedLook;
    }

    public function show($user_id)
    {
        $profile = $this->findProfile($user_id);
        $looks = $this->findLooks($user_id);
        $top6Brands = $this->findTop6Brands($looks);
        $followerList = $this->findFollowers($user_id);
        $followingList = $this->findFollowings($user_id);
        $likedLooks = $this->findLikedLooks($user_id);
        return view('dashboard.individual.looks-list')
            ->with('looks', $looks)
            ->with('profile', $profile)
            ->with('followerList', $followerList)
            ->with('followingList', $followingList)
            ->with('top6Brands', $top6Brands)
            ->with('likedLooks', $likedLooks);
    }
    public function showFollowing($user_id)
    {
        $profile = $this->findProfile($user_id);
        $looks = $this->findLooks($user_id);
        $top6Brands = $this->findTop6Brands($looks);
        $followerList = $this->findFollowers($user_id);
        $followingList = $this->findFollowings($user_id);
        $likedLooks = $this->findLikedLooks($user_id);
        return view('dashboard.individual.followings-list')
            ->with('looks', $looks)
            ->with('profile', $profile)
            ->with('followerList', $followerList)
            ->with('followingList', $followingList)
            ->with('top6Brands', $top6Brands)
            ->with('likedLooks', $likedLooks);
    }
    public function showFollower($user_id)
    {
        $profile = $this->findProfile($user_id);
        $looks = $this->findLooks($user_id);
        $top6Brands = $this->findTop6Brands($looks);
        $followerList = $this->findFollowers($user_id);
        $followingList = $this->findFollowings($user_id);
        $likedLooks = $this->findLikedLooks($user_id);
        return view('dashboard.individual.followers-list')
            ->with('looks', $looks)
            ->with('profile', $profile)
            ->with('followerList', $followerList)
            ->with('followingList', $followingList)
            ->with('top6Brands', $top6Brands)
            ->with('likedLooks', $likedLooks);
    }
    public function showLikedLooks($user_id)
    {
        $profile = $this->findProfile($user_id);
        $looks = $this->findLooks($user_id);
        $top6Brands = $this->findTop6Brands($looks);
        $followerList = $this->findFollowers($user_id);
        $followingList = $this->findFollowings($user_id);
        $likedLooks = $this->findLikedLooks($user_id);
        return view('dashboard.individual.liked-looks')
            ->with('looks', $looks)
            ->with('profile', $profile)
            ->with('followerList', $followerList)
            ->with('followingList', $followingList)
            ->with('top6Brands', $top6Brands)
            ->with('likedLooks', $likedLooks);
    }
}
