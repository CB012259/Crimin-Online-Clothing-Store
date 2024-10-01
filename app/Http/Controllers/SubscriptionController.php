<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Subscribed successfully!');
    }
    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->route('admin.subscribers')->with('success', 'Subscriber deleted successfully!');
    }
}