<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Login;
use App\Models\Shop;
use App\Models\SNS;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

// use Socialite;
class SNSController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request)
    {
        return view('auth.sns')->with('data', $request->data);
    }

    // ---------------------- SNS login ---------------------------
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $snsUser = Socialite::driver($provider)->user();
        $sns = SNS::where([
            ['uuid', $snsUser->id], ['provider', $provider]
        ])->first();

        // registered user
        if ($sns) {
            $this->login($sns->user_id);
        }

        if ($snsUser->email) {
            $login = Login::where('email', $snsUser->email)->first();

            if ($login) {
                $result = $this->store($login->user_id, $snsUser->id, $provider);
                return $this->login($result->user_id);
            }
        }

        $data = [
            'uuid'      => $snsUser->id,
            'name'      => $snsUser->name,
            'email'     => $snsUser->email,
            'provider'  => $provider,
        ];

        // return redirect('sns')->with(['data' => $data]);
        return redirect()->route('sns', ['data' => $data]);
    }

    private function login($userId)
    {
        if (Auth::loginUsingId(['id' => $userId])) {
            $this->setUserSession(Auth::user());
            $backUrl = session()->get("backUrl");

            if ($backUrl) {
                session()->forget("backUrl");
                return redirect()->intended($backUrl);
            }
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(['message' => 'Invalid user']);
    }


    public function registration(Request $request)
    {
        $this->validate(
            $request,
            [
                'name'   => 'required',
                'uuid'  => 'required',
                'provider' => 'required',
            ]
        );

        $data = $request->only('name', 'email', 'account_type', 'uuid', 'provider');
        $findSNS = SNS::where('uuid', $data['uuid'])->first();

        // already registered
        if ($findSNS) {
            return $this->login($findSNS->user_id);
        }

        if ($data['email']) {
            // user already registered by email address
            $findLogin = Login::where('email', $data['email'])->first();
            if ($findLogin) {
                $result = $this->store($findLogin->user_id, $data['uuid'], $data['provider']);
                return $this->login($result->user_id);
            }
        }

        $user = User::create([
            'first_name' => $data['name'],
            'picture' => '/img/profile-cartoon.jpg',
            'account_type' => $data['account_type'],
        ]);

        if ($data['email']) {
            Login::create([
                'user_id' => $user->id,
                'email' => $data['email'],
                'password' => Hash::make(rand(1000000, 50000000)),
            ]);
        }

        if ($data['account_type'] == 'shop') {
            Shop::create([
                'user_id' => $user->id
            ]);
        }

        $result = $this->store($user->id, $data['uuid'], $data['provider']);
        return $this->login($result->user_id);
    }

    public function store($userId, $uuid, $provider)
    {
        return SNS::firstOrCreate(
            ['uuid'      => $uuid, 'provider'  => $provider],
            [
                'user_id'   => $userId
            ]
        );
    }

    private function setUserSession($user)
    {
        session(
            [
                'api_prefix' => $user->account_type
            ]
        );
    }
}
