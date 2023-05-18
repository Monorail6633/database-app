@extends('layout')
@section('title', 'Item Index')
@section('content')
    <h1>Items</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Create Item</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Model No</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->model_no }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection