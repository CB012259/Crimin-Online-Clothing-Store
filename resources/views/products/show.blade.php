
@extends('layout.app')

@section('content')
<div class="container mx-auto p-6 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-center">
            <img src="{{ asset('storage/' . $product->image_url) }}" class="w-48 h-60 md:w-64 md:h-64 lg:w-80 lg:h-80 object-contain rounded-t-lg">
        </div>
        <div class="p-4 text-center">
            <h1 class="text-2xl font-semibold mb-4">{{ $product->name }}</h1>
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>
            <p class="text-gray-900 font-bold mb-4">${{ $product->price }}</p>
            <p class="text-gray-600 mb-4">Stock: {{ $product->stock_quantity }}</p>        

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