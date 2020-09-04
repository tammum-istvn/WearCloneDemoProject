<?php

namespace App\Http\Controllers\dashboard\shop;

use App\Http\Controllers\Controller;
use App\models\ItemDetail;
use App\Models\ItemDetailInformation;
use Illuminate\Http\Request;
use App\Traits\ImageUpload;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    use ImageUpload;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.shop.item-create');
    }

    public function show($id)
    {
        $item = Item::findorfail($id);
        return view('dashboard.shop.item-create')->with('item', $item);
    }


    public function store(Request $request)
    {
        //array Color
        $arrayColor = $request->color; //done

        //array Picture
        $filePath = array();
        $arrayPicture = $request->file('pictures');
        $length = count($arrayPicture) + count($arrayColor);
        for ($i=0; $i < $length; $i++) {
            if (!array_key_exists($i, $arrayPicture)) {
                $arrayPicture[$i] = "missing";
            }
        }

        $colorGroup = 0;
        for ($i = 0; $i < $length; $i++) {
            if ($arrayPicture[$i] == "missing") {
                $colorGroup = $colorGroup + 1;
            } else {
                $filePath[$colorGroup][] = $this->userImageUpload($arrayPicture[$i]);
            }
        }
        //Brand
        $brand_id = ($request->brand == 0) ? $brand_id = null : $brand_id = $request->brand;
        //Get Data From Table in HTML
        $tableData = json_decode($request->tableData);

        $profile_id = Auth::id();
        $item = Item::create([
            'title' =>  $request->title,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'brand_id' => $brand_id,
            'user_id' => $profile_id,
            'description' => $request->description,
        ])->id;

        foreach ($arrayColor as $key => $value) {
            $itemDetail = ItemDetail::create([
                'item_id' => $item,
                'color' => $value,
                'picture'=> $filePath[$key],
            ])->id;

            $currentColor = ItemDetail::where('id', '=', $itemDetail)->select('color')->get();

            for ($i = 0; $i < count($tableData); $i++) {
                if ($tableData[$i][0] == $currentColor[0]->color) {
                    $item_detail_informations = ItemDetailInformation::create([
                        'item_detail_id' => $itemDetail,
                        'size' => $tableData[$i][1],
                        'price' => $tableData[$i][2],
                    ]);
                }
            }
        }
        return redirect()->route('shop.profile', $profile_id);
    }

    public function update(Request $request, $id)
    {
        $item = Item::findorfail($id);

        //title, descrioption, category, subcategory, brand
        $item->title = $request->title;
        $item->description = $request->description;
        $item->category_id = $request->category;
        $item->sub_category_id = $request->sub_category;
        //Brand
        $new_brand_id = ($request->brand == 0) ? $new_brand_id = null : $new_brand_id = $request->brand;
        $item->brand_id = $new_brand_id;
        $item->save();

        $arrayColor = $request->color;
        $filePath = array();
        $arrayPicsFile = $request->pictures;
        $arrayPicsText = $request->pics;
        $tableData = json_decode($request->tableData);
        $pictureGroup = 0;

        $tableWasChanged = $request->modifyTable;
        $colorAndPictureWereChanged = $request->modifyColorPicture;
        //If user modify color and picture, it mean he modify the table,
        //but if he just modify table, so we don't need to handle with color and pic

        if ($arrayPicsFile != null) {
            for ($i = 0; $i < count($arrayPicsText); $i++) {
                if (!array_key_exists($i, $arrayPicsFile)) {
                    $arrayPicsFile[$i] = "missing";
                }
            }
            for ($i = 0; $i < count($arrayPicsText); $i++) {
                if ($arrayPicsText[$i] != null) {
                    $filePath[$pictureGroup][] = $arrayPicsText[$i];
                } else {
                    if ($arrayPicsFile[$i] == "missing") {
                        $pictureGroup = $pictureGroup + 1;
                    } else {
                        $filePath[$pictureGroup][] = $this->userImageUpload($arrayPicsFile[$i]);
                    }
                }
            }
        } else {
            for ($i = 0; $i < count($arrayPicsText); $i++) {
                if ($arrayPicsText[$i] != null) {
                    $filePath[$pictureGroup][] = $arrayPicsText[$i];
                } else {
                    $pictureGroup = $pictureGroup + 1;
                }
            }
        }
        if ($colorAndPictureWereChanged == "true") {
            //set is_delete of item detail and item detail information from 0 to 1
            foreach ($item->details as $key => $itemDetail) {
                $itemDetail->is_delete = 1;
                foreach ($itemDetail->informations as $keyDetail => $itemDetailInformation) {
                    $itemDetailInformation->is_delete = 1;
                    $itemDetailInformation->save();
                }
                $itemDetail->save();
            }

            //create new item detail and item detail information
            foreach ($arrayColor as $k => $v) {
                $newItemDetail = ItemDetail::create([
                    'item_id' => $id,
                    'color' => $v,
                    'picture' => $filePath[$k],
                ])->id;

                $currentColor = ItemDetail::where('id', '=', $newItemDetail)->select('color')->get();

                for ($i = 0; $i < count($tableData); $i++) {
                    if ($tableData[$i][0] == $currentColor[0]->color) {
                        $new_item_detail_informations = ItemDetailInformation::create([
                            'item_detail_id' => $newItemDetail,
                            'size' => $tableData[$i][1],
                            'price' => $tableData[$i][2],
                        ]);
                    }
                }
            }
        } else {
            if ($tableWasChanged == "true") {
                foreach ($item->details as $key => $itemDetail) {
                    foreach ($itemDetail->informations as $keyDetail => $itemDetailInformation) {
                        $itemDetailInformation->is_delete = 1;
                        $itemDetailInformation->save();
                    }
                }
                foreach ($item->details as $key => $itemDetail) {
                    $currentColor = $itemDetail->color;
                    $currentId = $itemDetail->id;
                    for ($i = 0; $i < count($tableData); $i++) {
                        if ($tableData[$i][0] == $currentColor) {
                            $new_item_detail_informations = ItemDetailInformation::create([
                                'item_detail_id' => $currentId,
                                'size' => $tableData[$i][1],
                                'price' => $tableData[$i][2],
                            ]);
                        }
                    }
                }
            }
        }
        $profile_id = Auth::id();
        return redirect()->route('shop.profile', $profile_id);
    }

    // delete item
    public function delete($id)
    {
        $item = Item::findorfail($id);
        foreach ($item->details as $key => $itemDetail) { //Delete the old item detail
            $itemDetail->is_delete = 1;
            foreach ($itemDetail->informations as $keyDetail => $itemDetailInformation) {
                $itemDetailInformation->is_delete = 1;
                $itemDetailInformation->save();
            }
            $itemDetail->save();
        }
        $item->is_delete = 1;
        $item->save();
        $profile_id = Auth::id();
        return redirect()->route('shop.profile', $profile_id);
    }

    public function loadLike()
    {
    }
}
