<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Interfaces\IAccountType;
use App\Models\Login;
use App\Models\Cart;
use App\Session\CartSession;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function setUserSession($user)
    {
        // save cart data into session
        $cart = new Cart();
        $data = $cart->getCart($user->id);
        $cartSession = new CartSession();
        $cartSession->saveCart($data['cart']);
        $cartSession->saveQuantity($data['quantity']);

        session(
            [
                'api_prefix'    => $user->account_type,
            ]
        );
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // find user from database
        $login = Login::where('email', $request->email)->first();

        if (!$login) {
            return $this->sendFailedLoginResponse($request);
        }
        // checking password
        if (!Hash::check($request->password, $login->password)) {
            return $this->sendFailedLoginResponse($request);
        }

        if (Auth::loginUsingId(['id' => $login->user_id])) {
            // $this->updateCarts($request, $login->user_id);

            // return redirect()->route('home');
            $this->setUserSession(Auth::user());
            $backUrl = session()->get("backUrl");
            if ($backUrl) {
                session()->forget("backUrl");
                return redirect()->intended($backUrl);
            }
            return redirect()->intended('/');
            // return redirect()->route('home');
        }
    }

    // private function updateCarts(Request $request, $user_id)
    // {
    //     $carts = json_decode($request->carts);
        
    //     foreach ($carts as $cart) {
    //         Cart::updateOrCreate(
    //             ['user_id' => $user_id, 'item_detail_information_id' => $cart->item_detail_information_id],
    //             ['quantity' => $cart->quantity]
    //         );
    //     }
    // }
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}
