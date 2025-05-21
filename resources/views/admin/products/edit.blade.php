@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Form fields for name, description, price, and image -->
        <!-- ... -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection