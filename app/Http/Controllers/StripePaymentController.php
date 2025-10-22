<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;

class StripePaymentController extends Controller
{
    // public function stripe()
    // {
    //     return view('stripe');
    // }

    public function session(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Test Product',
                    ],
                    'unit_amount' => 10000,
                ],
                'quantity' => 2,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success', ['?session_id' => '{CHECKOUT_SESSION_ID}']),
            'cancel_url' => route('stripe.cancel', ['?session_id' => '{CHECKOUT_SESSION_ID}']),
        ]);

        return redirect($session->url);
        // dd($session);

        return response()->json(['id' => $session->id]);
        
    }

        public function success(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $session_id = $request->get('session_id');
        
        if (!$session_id) {
            return 'Session ID is Missing.';
        }
        $session = Session::retrieve($session_id);
        $payment_intent = $session->payment_intent;
        $payment = PaymentIntent::retrieve($payment_intent);
        dd($payment);
    }

        public function cancel(Request $request)
    {
        
    }
}
