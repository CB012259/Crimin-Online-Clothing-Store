

@extends('layout.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Stock Available</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="50">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->product ? $item->product->stock_quantity : 'N/A' }}</td>
                        <td>{{ $item->product ? $item->product->price : 'N/A' }}</td>
                        <td>{{ $item->product ? $item->product->price * $item->quantity : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<a href="{{ url()->previous() }}" class="text-black hover:text-white hover:bg-black px-3 py-2 rounded-md transition duration-300">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
    </a>
@endsection