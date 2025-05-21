<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }

    public function process(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Charge::create([
            "amount" => 1000,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test Charge"
        ]);

        session()->forget('cart');
        return redirect()->route('shop')->with('success', 'Payment successful!');
    }
}
