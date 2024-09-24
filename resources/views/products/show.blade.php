
@extends('layout.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <img src="{{ asset('storage/' . $product->image_url) }}" class="w-full h-64 object-cover rounded-t-lg">
        <div class="p-4">
            <h1 class="text-2xl font-semibold">{{ $product->name }}</h1>
            <p class="text-gray-600">{{ $product->description }}</p>
            <p class="text-gray-900 font-bold">${{ $product->price }}</p>
        </div>
    </div>
</div>
@endsection