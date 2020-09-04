<?php

namespace App\Http\Controllers\Dashboard\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;

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
        $user =  Auth::user();

        return view('dashboard.individual.edit-profile')->with('individual', $user);
    }

    public function edit(Request $request, $user_id)
    {
        $this->validate(
            $request,
            [
            'first_name' => 'required',
            'introduction' => 'required',
            ],
            [
                'first_name.required' => __('edit_profile_ind.first_required'),
                'introduction.required' => __('edit_profile_ind.intro_required')
            ]
        );

        $user =  User::findorfail($user_id);

        if (!empty($request->dob)) {
            $user->date_of_birth = $request->dob;
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->height = $request->height;
        $user->phone = $request->phone;
        $user->introduction = $request->introduction;
        $user->save();

        return back()->with('message', __('edit_profile_ind.updated'));
    }
}
