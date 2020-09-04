<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function list($category_id)
    {
        return SubCategory::where('category_id', $category_id)->get();
    }
}
