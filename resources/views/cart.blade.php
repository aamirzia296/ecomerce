@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @if(session('cart'))
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach(session('cart') as $id => $details)
            @php $total += $details['price'] * $details['quantity'] @endphp
            <tr>
                <td>{{ $details['name'] }}</td>
                <td>
                    <form action="{{ route('update.cart') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button class="btn btn-sm btn-primary">Update</button>
                    </form>
                </td>
                <td>${{ $details['price'] }}</td>
                <td>${{ $details['price'] * $details['quantity'] }}</td>
                <td>
                    <form action="{{ route('remove.from.cart') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button class="btn btn-sm btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <strong>Total: ${{ $total }}</strong>
    </div>
    <a href="{{ route('checkout') }}" class="btn btn-success mt-3">Proceed to Checkout</a>
    @else
    <p>Your cart is empty.</p>
    @endif
</div>
@endsection
