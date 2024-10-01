@extends('layout.app')

<head>
    <title>
        Products
    </title>
</head>
@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold mb-4">Products</h1>

                <p>
                    <a href="{{ route('products.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Product</a>
                </p>

                <table class="min-w-full bg-white border border-gray-200 mt-4">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Image</th> <!-- Added Image Column -->
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Price</th>
                        <th class="py-2 px-4 border-b">Stock</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">
                                @if ($product->image_url)
                                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="h-16 w-16 object-cover">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->stock_quantity}}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:underline">Edit</a>
                                <br>
                                <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                     @method('DELETE')

                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <br><a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back</a>

        </div>
    </div>
@endsection
