<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\Auth;

class ProfilePictureController extends Controller
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

    public function show()
    {
        return view('dashboard.profile-picture');
    }

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'image.required' => __('change_pic.image_required')
            ]
        );
        
        $filePath = $this->userImageUpload($request->image);
        $user =  User::findorfail(Auth::user()->id);

        $user->picture = $filePath;
        $user->save();
        return back()->with('message', __('change_pic.updated'));
    }
}
