@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>
    <form action="{{ route('checkout.process') }}" method="POST" id="payment-form">
        @csrf
        <!-- Stripe Elements Placeholder -->
        <button class="btn btn-primary mt-3">Pay Now</button>
    </form>
</div>
@endsection
