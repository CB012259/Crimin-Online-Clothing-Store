<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Product;

class purchaseController extends Controller
{
    public function show(Request $request)
    {
        $productId = $request->product_id ?? 1;
        $product = Product::find($productId);

        if (!$product) {
            return back()->withErrors('Product not found.');
        }

        $amount = $product->price;
        $quantity = $request->quantity ?? 1; // Default quantity is 1
        $netAmount = $amount * $quantity;

        return view('purchase', ['amount' => $amount, 'netAmount' => $netAmount, 'quantity' => $quantity]);
    } 

    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        
        $amount = $request->amount * 100; // Convert to cents

        if ($amount < 1) {
            return back()->withErrors('The amount must be at least $0.01.');
        }

        try {
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment description',
            ]);

            return back()->with('success_message', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->withErrors('Error: ' . $e->getMessage());
        }
    }
    
}