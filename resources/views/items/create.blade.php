@extends('layout')
@section('title', 'Add Item')
@section('content')
    <h1>Create Item</h1>
    
    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="model_no">Model No</label>
            <input type="text" name="model_no" id="model_no" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection