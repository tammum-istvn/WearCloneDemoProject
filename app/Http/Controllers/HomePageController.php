<?php

namespace App\Http\Controllers;

use App\Models\Look;
use App\Models\TrendingHashtag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class HomePageController extends Controller
{
    public function index(Request $request)
    {
        $interest = $this->interest($request->interest);
        $trendingHashTag = $this->trending($request->trending);
        $recentlyLooks = null;
        $trendingLooks = array();

        if ($interest) {
            $recentlyLooks = Look::orderBy('id', 'desc')
                ->where([
                    ['gender', $interest],
                    ['is_delete', false]
                ])
                ->simplePaginate(9);
        } else {
            $recentlyLooks = Look::orderBy('id', 'desc')
                ->where('is_delete', false)
                ->simplePaginate(9);
        }
//        $top8HashTags = TrendingHashtag::
//        where('updated_at', '>=', Carbon::now()->toDateTimeString())->orderBy('created_at', 'desc')->take(8)->get();
        $top8HashTags = TrendingHashtag::orderBy('updated_at', 'desc')->take(8)->get();
        $hotTag = (count($top8HashTags) > 0) ? $top8HashTags[0]->hashTag->name : "";
        if (!$trendingHashTag) {
            $trendingHashTag = $hotTag;
        }
        foreach ($recentlyLooks as $look) {
            if (isset($look->hashtags)) {
                foreach ($look->hashtags as $lookHashTag) {
                    if ($lookHashTag->hashTag->name == $trendingHashTag) {
                        array_push($trendingLooks, $look);
                    }
                }
            }
        }
        return view(
            'homePage/home-page',
            compact('recentlyLooks', 'trendingLooks', 'trendingHashTag', 'top8HashTags')
        );
    }

    private function interest($interest)
    {
        if ($interest) {
            session(['interest' => $interest]);
        } else {
            session(['interest' => ""]);
        }
        return session('interest', '');
    }
    private function trending($trending)
    {
        if ($trending) {
            session(['trending' => $trending]);
        } else {
            session(['trending' => ""]);
        }
        return session('trending', '');
    }
}
