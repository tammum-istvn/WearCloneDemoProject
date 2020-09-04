<?php

namespace App\Http\Controllers;

use App\models\Ranking;
use App\Repositories\RankingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    private $rankingRepository;

    public function __construct(RankingRepositoryInterface $rankingRepository)
    {
        $this->rankingRepository = $rankingRepository;
    }

    public function show(Request $request)
    {
        // $ranking = new Ranking();
        // $rankPageData = $ranking->getRankPageData($request->type);
        
        if ($request->type == 'shop') {
            $rankPageData = $this->rankingRepository->shop();
        } else {
            $rankPageData = $this->rankingRepository->user($request->type);
        }

        // dd($rankPageData[0]);
        // dd($rankPageData[0]);
        return view('ranking.user-list')->with('rankPageData', $rankPageData)->with('userType', $request->type);
    }

    public function getUserList(Request $request)
    {
        $ranking = new Ranking();
        $rankPageData = $ranking->getRankPageData($request->displayType);
        return response()->json(array("rankPageData" => $rankPageData), 200);
    }
    
    public function getShopList(Request $request)
    {
        $ranking = new Ranking();
        $rankPageData = $ranking->getRankPageData($request->displayType);
        return response()->json(array("rankPageData" => $rankPageData), 200);
    }
}
