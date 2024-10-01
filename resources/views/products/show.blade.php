
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
                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Leave a Review</h2>
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                        <div class="mb-4">
                            <label for="review" class="block text-sm font-medium text-gray-700">Your Review:</label>
                            <textarea id="review" name="review" rows="4" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Write your review here..." required></textarea>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Submit Review</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">Reviews</h2>
                    @if($reviews->isEmpty())
                        <p class="text-gray-600">No reviews yet.</p>
                    @else
                        @foreach($reviews as $review)
                            <div class="mb-4">
                                <p class="text-gray-900 font-bold">{{ $review->product_name }}</p>
                                <p class="text-gray-600">{{ $review->review }}</p>
                                <p class="text-gray-500 text-sm">{{ $review->created_at->format('F j, Y, g:i a') }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection