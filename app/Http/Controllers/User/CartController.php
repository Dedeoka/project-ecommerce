<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = Auth::user()->carts()->where('status','notyet')->get();
        $total = 0;
        foreach($cart as $item){
            $total += $item->product->price * $item->qty;
        }
        return view('user.pages.cart', compact('cart','total'));
    }

    public function create($id){
        $exist_cart = Cart::where('user_id',Auth::user()->id)->where('product_id',$id)->where('status','notyet')->get();
        $cart = new Cart;

        if(count($exist_cart)>0){
            $exist_cart->first()->qty += 1;
            $exist_cart->first()->save();
        }else{
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $id;
            $cart->qty = '1';
            $cart->status = 'notyet';
            $cart->save();
        }
        return redirect('product');
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }
}
