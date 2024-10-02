@extends('layout.app')

@section('content')
<div class="container mx-auto p-6 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl w-full">
        <!-- Product Image -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('storage/' . $product->image_url) }}" class="w-48 h-60 md:w-64 md:h-64 lg:w-80 lg:h-80 object-contain rounded-lg">
        </div>

        <!-- Product Details -->
        <div class="text-center">
            <h1 class="text-2xl font-semibold mb-4">{{ $product->name }}</h1>
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-700">Description</h2>
                <p class="text-gray-600 mt-2">{{ $product->description }}</p>
            </div>

            <!-- Product Info Table -->
            <table class="min-w-full bg-white mb-6">
                <tbody>
                    @foreach (['Price' => '$' . $product->price, 'Available Stock' => $product->stock_quantity, 'Size' => $product->size, 'Color' => $product->color, 'Category' => $product->category, 'Gender' => $product->gender, 'Brand' => $product->brand, 'Material' => $product->material] as $key => $value)
                        <tr class="border-b">
                            <td class="py-2 px-4 font-semibold text-gray-700">{{ $key }}:</td>
                            <td class="py-2 px-4 text-gray-600">{{ $value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Action Buttons (Add to Cart, View Cart) -->
            <div class="flex flex-col md:flex-row md:space-x-4 justify-center mb-8">
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4 md:mb-0">
                    @csrf
                    <button type="submit" class="btn btn-primary bg-gray-200 w-full md:w-auto bg-red text-black py-2 px-4 rounded-md hover:bg-gray-100">Add to Cart</button>
                </form>
                <form action="{{ route('cart') }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-secondary w-full md:w-auto bg-black text-white py-2 px-4 rounded-md hover:bg-gray-600">View Cart</button>
                </form>
            </div>
             <!-- Buy Product Button -->
             <div class="mt-8 bg-gray-900 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-white mb-6">Buy Product</h2>
                <form action="{{ route('purchase.show') }}" method="GET" class="space-y-4">
                    @csrf
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-300">Select Quantity</label>
                        <select id="quantity" name="quantity" required class="mt-1 block w-32 bg-gray-800 text-white py-2 px-3 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="w-full md:w-auto bg-red-500 text-white py-2 px-10 rounded-md hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 text-lg font-bold">
                        Buy
                    </button>
                </form>
            </div>


            <!-- Review Section -->
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Leave a Review</h2>
                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <div class="mb-4">
                        <label for="review" class="block text-sm font-medium text-gray-700">Your Review:</label>
                        <textarea id="review" name="review" rows="4" class="block w-full text-black py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Write your review..." required></textarea>
                    </div>
                    <button type="submit" class="bg-black text-white py-2 px-4 rounded-md hover:bg-gray-700">Submit Review</button>
                </form>
            </div>

            <!-- Reviews Display -->
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Reviews</h2>
                @if($reviews->isEmpty())
                    <p class="text-gray-600">No reviews yet.</p>
                @else
                    @foreach($reviews as $review)
                        <div class="mb-4">
                            <p class="font-bold text-gray-900">{{ $review->product_name }}</p>
                            <p class="text-gray-600">{{ $review->review }}</p>
                            <p class="text-sm text-gray-500">{{ $review->created_at->format('F j, Y, g:i a') }}</p>
                        </div>
                    @endforeach
                @endif
            </div>

           
        </div>
    </div>
</div>
@endsection
