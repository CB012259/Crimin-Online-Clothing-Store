<?php
namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerSupportController extends Controller
{
    public function storeQuestion(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'question' => 'required|string|max:255',
        ]);

        Question::create([
            'email' => $request->email,
            'question' => $request->question,
        ]);

        return redirect()->back()->with('success', 'Your question has been submitted.');
    }
    public function storeReview(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_name' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        Review::create([
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'review' => $request->review,
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted.');
    }
    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::where('product_id', $id)->get();

        return view('products.show', compact('product', 'reviews'));
    }
}