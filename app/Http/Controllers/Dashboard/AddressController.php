<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.address');
    }
    
    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
            'post_code' => 'required',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
            ],
            [
                'post_code.required' => __('edit_profile_ind.post_required'),
                'province.required' => __('edit_profile_ind.province_required'),
                'city.required' => __('edit_profile_ind.city_required'),
                'address.required' => __('edit_profile_ind.address_required'),
            ]
        );

        // update or create new address
        Address::updateOrCreate(
            ['user_id' => Auth::user()->id],
            request()->only('post_code', 'province', 'city', 'address')
        );

        return back()->with('message', __('Address updated'));
    }
}
