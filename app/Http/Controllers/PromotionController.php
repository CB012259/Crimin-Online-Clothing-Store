<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }
    public function show()
    {
        $promotions = Promotion::all();
        return view('Promotions', compact('promotions'));
    }

    public function create()
    {
        return view('promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('promotions', 'public');

        Promotion::create([
            'image_path' => $imagePath,
        ]);

        return redirect()->route('promotions.index')->with('success', 'Promotion image uploaded successfully.');
    }
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        Storage::disk('public')->delete($promotion->image_path);
        $promotion->delete();

        return redirect()->route('promotions.index')->with('success', 'Promotion image deleted successfully.');
    }
}