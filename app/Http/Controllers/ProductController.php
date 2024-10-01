<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductReques;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }
    public function showWelcomePage()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequest  $request
     * @return RedirectResponse
     */
    
     
     public function store(StoreProductRequest $request) : RedirectResponse
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
             'price' => 'required|numeric',
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
              'stock_quantity' => 'required|integer',
              'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'material' => 'required|string|max:255',
         ]);
     
         $product = new Product();
         $product->name = $request->name;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->stock_quantity = $request->stock_quantity;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->category = $request->category;
        $product->gender = $request->gender;
        $product->brand = $request->brand;
        $product->material = $request->material;
         if ($request->hasFile('image')) {
             if ($request->file('image')->isValid()) {
                 $imagePath = $request->file('image')->store('images', 'public');
                 $product->image_url = $imagePath;
             } else {
                 \Log::error('Uploaded file is not valid.');
             }
         } else {
             \Log::error('No file found in the request.');
         }
     
         $product->save();
     
         return redirect()->route('products.index')->with('success', 'Product created successfully.');
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return View
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductReques  $request
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function update(UpdateProductReques $request, Product $product) : RedirectResponse
    {
        $data = $request->validated();
    
        if ($request->hasFile('image')) {
            // Handle the image upload
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image_url'] = $imagePath;
    
            // Optionally, delete the old image
            if ($product->image_url) {
                Storage::disk('public')->delete($product->image_url);
            }
        }
    
        $product->update($data);
    
        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function destroy(Product $product) : RedirectResponse
{
    // Delete the image file if it exists
    if ($product->image_url) {
        Storage::disk('public')->delete($product->image_url);
    }

    // Delete the product record from the database
    $product->delete();

    return redirect()->route('products.index')
                     ->with('success', 'Product deleted successfully.');
}
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    
public function welcome(Request $request)
{
    $query = Product::query();

    if ($request->has('category') && $request->category != '') {
        $query->where('category', $request->category);
    }
    if ($request->has('size') && $request->size != '') {
        $query->where('size', $request->size);
    }
    if ($request->has('color') && $request->color != '') {
        $query->where('color', $request->color);
    }
    if ($request->has('gender') && $request->gender != '') {
        $query->where('gender', $request->gender);
    }
    if ($request->has('brand') && $request->brand != '') {
        $query->where('brand', $request->brand);
    }
    if ($request->has('material') && $request->material != '') {
        $query->where('material', $request->material);
    }
    if ($request->has('price') && $request->price != 'all') {
        $priceRange = explode('-', $request->price);
        if (count($priceRange) == 2) {
            $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        } elseif ($request->price == '200') {
            $query->where('price', '>=', 200);
        }
    }


    $products = $query->get();

    return view('welcome', compact('products'));
}
}
