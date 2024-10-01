@extends('layout.app')
<head>
    <title>
        Create Product
    </title>
</head>
@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-4">Create Product</h1>

        <form method="POST" action="{{ route('products.store') }}" class="max-w-lg mx-auto" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="description" required
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Product Image:</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700">Stock Quantity:</label>
                <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity') }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="size" class="block text-sm font-medium text-gray-700">Size:</label>
                <select id="size" name="size" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" disabled selected>Select</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="color" class="block text-sm font-medium text-gray-700">Color:</label>
                <input type="text" name="color" id="color" value="{{ old('color') }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category:</label>
                <select id="category" name="category" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" disabled selected>Select</option>
                    <option value="t-shirts">T-shirts</option>
                    <option value="bottoms">Bottoms</option>
                    <option value="accessories">Accessories</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender:</label>
                <select id="gender" name="gender" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="" disabled selected>Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="unisex">Unisex</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="brand" class="block text-sm font-medium text-gray-700">Brand:</label>
                <input type="text" name="brand" id="brand" value="{{ old('brand') }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="material" class="block text-sm font-medium text-gray-700">Material:</label>
                <input type="text" name="material" id="material" value="{{ old('material') }}" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="flex items-center">
                <button type="submit"
                        class="inline-block bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Create
                </button>

                 </div><br><button onclick="history.back()" class="btn btn-primary">Back</button>

        </form>
    </div>
@endsection

