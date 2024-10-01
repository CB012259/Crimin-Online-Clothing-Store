
@extends('layout.app')

@section('content')
<div class="container mx-auto p-6 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-center">
            <img src="{{ asset('storage/' . $product->image_url) }}" class="w-48 h-60 md:w-64 md:h-64 lg:w-80 lg:h-80 object-contain rounded-t-lg">
        </div>
        <div class="p-4 text-center">
        
<div class="p-4 text-center">
    <h1 class="text-2xl font-semibold mb-4">{{ $product->name }}</h1>

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-700">Description</h2>
        <p class="text-gray-600 mt-2">{{ $product->description }}</p>
    </div>

    <table class="min-w-full bg-white">
        <tbody>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Price:</td>
                <td class="py-2 px-4 text-gray-900 font-bold">${{ $product->price }}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Available Stock:</td>
                <td class="py-2 px-4 text-gray-600">{{ $product->stock_quantity }}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Size:</td>
                <td class="py-2 px-4 text-gray-600">{{ $product->size }}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Color:</td>
                <td class="py-2 px-4 text-gray-600">{{ $product->color }}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Category:</td>
                <td class="py-2 px-4 text-gray-600">{{ $product->category }}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Gender:</td>
                <td class="py-2 px-4 text-gray-600">{{ $product->gender }}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Brand:</td>
                <td class="py-2 px-4 text-gray-600">{{ $product->brand }}</td>
            </tr>
            <tr class="w-full border-b">
                <td class="py-2 px-4 font-semibold text-gray-700">Material:</td>
                <td class="py-2 px-4 text-gray-600">{{ $product->material }}</td>
            </tr>
        </tbody>
    </table>
</div><br>
            <div class="flex flex-col md:flex-row md:space-x-4 justify-center">
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4 md:mb-0">
                    @csrf
                    <button type="submit" class="btn btn-primary w-full md:w-auto">Add to Cart</button>
                </form>
                <form action="{{ route('cart') }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-secondary w-full md:w-auto">View Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection