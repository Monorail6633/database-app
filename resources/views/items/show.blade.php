@extends('layout')
@section('title', 'Show Item')
@section('content')
    <h1>Item Details</h1>
    
    <div>
        <strong>Product Name:</strong> {{ $item->product_name }}
    </div>
    
    <div>
        <strong>Brand:</strong> {{ $item->brand }}
    </div>
    
    <div>
        <strong>Price:</strong> {{ $item->price }}
    </div>
    
    <div>
        <strong>Model No:</strong> {{ $item->model_no }}
    </div>
    
    <div>
        <strong>Stock:</strong> {{ $item->stock }}
    </div>
    
    <div>
        <a href="{{ route('items.edit', $item) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection