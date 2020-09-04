<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Session\CartSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        return view('cart');
    }

    public function save(Request $request)
    {
        // $result = Cart::updateOrCreate(
        //     ['user_id' => $request->user_id, 'item_detail_information_id' => $request->item_detail_information_id],
        //     ['quantity' => $request->quantity]
        // );
        $cartItem = Cart::firstOrNew(
            ['user_id' => Auth::user()->id, 'item_detail_information_id' => $request->item_detail_information_id],
            ['quantity' => $request->quantity]
        );

        $cartItem->quantity += $request->quantity;
        $cartItem->save();

    
        if ($cartItem) {
            $data = $this->updateCartSession(Auth::user()->id);
            return response()->json($data, 200);
        }

        return response()->json($cartItem, 202);
    }

    public function updateCartSession($user_id)
    {
        $cart = new Cart();
        $data = $cart->getCart($user_id);
        $cartSession = new CartSession();
        $cartSession->saveCart($data['cart']);
        $cartSession->saveQuantity($data['quantity']);

        return $data;
    }

    public function delete($id)
    {

        $item = Cart::find($id);
        $result = $item->delete();

        if ($result) {
            $data = $this->updateCartSession(Auth::user()->id);
            return response()->json($data['quantity'], 200);
        }

        return response()->json($result, 202);
    }

    public function checkout(Request $request)
    {
        $user_id = Auth::user()->id;
        return $request->all();
    }
}
