@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Products</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
    <table class="table mt-3">
        <thead>
            <tr><th>Name</th><th>Price</th><th>Action</th></tr>
        </thead>
        <tbody>
            @foreach($products as $product)
              <tr>
                  <td>{{ $product->name }}</td>
                  <td>${{ $product->price }}</td>
                  <td>
                      <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                      <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger">Delete</button>
                      </form>
                  </td>
              </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
