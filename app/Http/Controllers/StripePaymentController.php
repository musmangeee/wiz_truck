<?php
   
namespace App\Http\Controllers;
   
use Stripe;
use Session;
use App\Order;
use Illuminate\Http\Request;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe/stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd", 
                "source" => $request->stripeToken,
                "description" => "stripe" 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
 
}