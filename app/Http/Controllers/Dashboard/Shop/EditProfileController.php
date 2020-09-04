<?php

namespace App\Http\Controllers\Dashboard\Shop;

use App\Http\Controllers\Controller;
use App\models\Address;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.shop.edit-profile');
    }

    public function edit(Request $request, $user_id)
    {
        $this->validate(
            $request,
            [
            'name' => 'required',
            'website' => 'required',
            'introduction' => 'required',
            ],
            [
                'name.required' => __('First name'),
                'website.required' => __('Webstie'),
                'introduction.required' => __('edit_profile_shop.intro_required')
            ]
        );

        $user =  User::findorfail($user_id);
        $shop = Shop::findorfail($user_id);

        if (!empty($request->dob)) {
            $user->date_of_birth = $request->dob;
        }

        $user->first_name = $request->name;

        $user->phone = $request->phone;
        $user->introduction = $request->introduction;
        $user->save();
         
        $shop->website = $request->website;
        $shop->save();

        return back()->with('message', __('edit_profile_shop.updated'));
    }
}
