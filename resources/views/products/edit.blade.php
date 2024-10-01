@extends('layout.app')
<head>
    <title>
        Edit Product Details
    </title>
</head>
@section('content')
    <div class="container mx-auto py-8">


        <h1 class="text-3xl font-bold mb-4">Edit Product</h1>


        <form method="POST" action="{{ route('products.update', $product) }}" class="max-w-lg mx-auto" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="description" required
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Stock Quantity:</label>
                <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Product Image:</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @if($product->image_url)
                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="mt-2 w-32 h-32 object-cover">
                @endif
            </div>
            <div class="mb-4">
    <label for="color" class="block text-sm font-medium text-gray-700">Color:</label>
    <input type="text" name="color" id="color" value="{{ $product->color }}"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
</div>

<div class="mb-4">
    <label for="size" class="block text-sm font-medium text-gray-700">Size:</label>
    <input type="text" name="size" id="size" value="{{ $product->size }}"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
</div>

<div class="mb-4">
    <label for="category" class="block text-sm font-medium text-gray-700">Category:</label>
    <input type="text" name="category" id="category" value="{{ $product->category }}"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
</div>
<div class="mb-4">
    <label for="gender" class="block text-sm font-medium text-gray-700">Gender:</label>
    <input type="text" name="gender" id="gender" value="{{ $product->gender }}"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
</div>

<div class="mb-4">
    <label for="brand" class="block text-sm font-medium text-gray-700">Brand:</label>
    <input type="text" name="brand" id="brand" value="{{ $product->brand }}"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
</div>

<div class="mb-4">
    <label for="material" class="block text-sm font-medium text-gray-700">Material:</label>
    <input type="text" name="material" id="material" value="{{ $product->material }}"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
</div>

            <div class="flex items-center">
                <button type="submit"
                        class="inline-block bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update
                </button>
            </div> 
            
        </form>
        <br><button onclick="history.back()" class="btn btn-primary">Back</button>

    </div>
@endsection
