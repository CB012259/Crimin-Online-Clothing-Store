@extends('layout.app')

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
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Price</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:underline">Edit</a>
<br>
                                <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline-block">
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
            <br><button onclick="history.back()" class="btn btn-primary">Back</button>


        </div>
    </div>
@endsection
