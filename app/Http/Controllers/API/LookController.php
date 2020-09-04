<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Look;

class LookController extends Controller
{
    // user: profile_id
    public function list()
    {
        return Look::get();
    }
    
    public function listByUser($user)
    {
        return Look::where('user', $user)->get();
    }
}
