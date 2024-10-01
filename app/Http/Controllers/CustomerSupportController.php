<?php
namespace App\Http\Controllers;

use App\Models\Question;
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
}