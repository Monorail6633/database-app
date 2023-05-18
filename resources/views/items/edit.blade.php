@extends('layout')
@section('title', 'Edit Item')
@section('content')
    <h1>Edit Item</h1>
    
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="{{ $item->product_name }}" required>
        </div>
        
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control" value="{{ $item->brand }}" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $item->price }}" required>
        </div>
        
        <div class="form-group">
            <label for="model_no">Model No</label>
            <input type="text" name="model_no" id="model_no" class="form-control" value="{{ $item->model_no }}" required>
        </div>
        
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $item->stock }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection