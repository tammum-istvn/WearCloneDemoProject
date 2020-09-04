<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Look;
use App\Models\Shop;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $gender = $request->get('gender');
        $color = $request->get('color');
        $size = $request->get('size');
        $minHeight = is_null($request->get('minHeight')) ? 50 : $request->get('minHeight') + 0;
        $maxHeight = is_null($request->get('maxHeight')) ? 200 : $request->get('maxHeight') + 0;
        $keyword = is_null($request->get('search')) ? $request->get('keyword') : $request->get('search');

        //if user choose gender not "all"
        if ($gender && $gender[0] != "all") {
            $users = User::where('first_name', 'like', '%'.$keyword.'%')
                    ->whereBetween('height', array($minHeight, $maxHeight))
                    ->whereIn('gender', $gender)
                    ->get();
            $looks = Look::where(function ($query) use ($keyword) {
                    $query->where('title', 'like', '%'.$keyword.'%')
                        ->orWhere('description', 'like', '%'.$keyword.'%')
                        ->orWhereHas('user', function ($q) use ($keyword) {
                            $q->where('first_name', 'like', '%'.$keyword.'%');
                        });
            })->whereBetween('height', array($minHeight, $maxHeight))->whereIn('gender', $gender)->get();
        } else {
            $users = User::where('first_name', 'like', '%'.$keyword.'%')
                ->whereBetween('height', array($minHeight, $maxHeight))
                ->get();
            $looks = Look::where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%')
                    ->orWhere('description', 'like', '%'.$keyword.'%')
                    ->orWhereHas('user', function ($q) use ($keyword) {
                        $q->where('first_name', 'like', '%'.$keyword.'%');
                    });
            })->whereBetween('height', array($minHeight, $maxHeight))->get();
        }

        // item search
        $items = Item::where('title', 'like', '%'.$keyword.'%')
        ->orWhereHas('category', function ($q) use ($keyword) {
            $q->where('name', 'like', '%'.$keyword.'%');
        })
        ->orWhereHas('subCategory', function ($q) use ($keyword) {
            $q->where('name', 'like', '%'.$keyword.'%');
        })
        ->get();
//        dd($items);
        $itemsAfterFilterColor = array();
        if ($color && $color[0] != "all") {
            foreach ($items as $item) {
                foreach ($item->details as $itemDetail) {
                    if (in_array($itemDetail->color, $color)) {
                        array_push($itemsAfterFilterColor, $item);
                    }
                }
            }
        } else {
            foreach ($items as $item) {
                array_push($itemsAfterFilterColor, $item);
            }
        }
        $itemsAfterFilterColor = array_unique($itemsAfterFilterColor);
//        dd($itemsAfterFilterColor);
        $itemsAfterFilterSize = array();
        if ($size && $size[0] != "all") {
            foreach ($itemsAfterFilterColor as $itemAfterFilterColor) {
                foreach ($itemAfterFilterColor->details as $idetail) {
                    foreach ($idetail->informations as $idetailinfo) {
                        if (in_array($idetailinfo->size, $size)) {
                            array_push($itemsAfterFilterSize, $itemAfterFilterColor);
                        }
                    }
                }
            }
        } else {
            foreach ($itemsAfterFilterColor as $itemAfterFilterColor) {
                array_push($itemsAfterFilterSize, $itemAfterFilterColor);
            }
        }
        $itemsAfterFilterSize = array_unique($itemsAfterFilterSize);
//        dd($itemsAfterFilterSize);
        return view('search-result')
            ->with('gender', $gender)
            ->with('color', $color)
            ->with('size', $size)
            ->with('users', $users)
            ->with('looks', $looks)
            ->with('items', $itemsAfterFilterSize)
            ->with('keyword', $keyword)
            ->with('maxHeight', $maxHeight)
            ->with('minHeight', $minHeight);
    }
}
