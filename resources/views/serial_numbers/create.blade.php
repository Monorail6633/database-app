@extends('layout')
@section('title', 'Add Serial')
@section('content')
    <h1>Create Serial Number</h1>
    <form action="{{ route('serial_numbers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control" value="{{ old('product_id') }}">
        </div>
        <div class="form-group">
            <label for="serial_no">Serial No</label>
            <input type="text" name="serial_no" id="serial_no" class="form-control" value="{{ old('serial_no') }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="prod_date">Prod Date</label>
            <input type="date" name="prod_date" id="prod_date" class="form-control" value="{{ old('prod_date') }}">
        </div>
        <div class="form-group">
            <label for="warranty_start">Warranty Start</label>
            <input type="date" name="warranty_start" id="warranty_start" class="form-control" value="{{ old('warranty_start') }}">
        </div>
        <div class="form-group">
            <label for="warranty_duration">Warranty Duration</label>
            <input type="text" name="warranty_duration" id="warranty_duration" class="form-control" value="{{ old('warranty_duration') }}">
        </div>
        <div class="form-group">
            <label for="used">Used</label>
            <select name="used" id="used" class="form-control">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
