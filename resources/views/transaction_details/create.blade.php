@extends('layout')
@section('title', 'Add Transaction Details')
@section('content')
    <h1>Create Transaction Detail</h1>
    <form action="{{ route('transaction_details.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="transaction_id">Transaction ID</label>
            <input type="text" name="transaction_id" id="transaction_id" class="form-control" value="{{ old('transaction_id') }}">
        </div>
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
            <label for="discount">Discount</label>
            <input type="text" name="discount" id="discount" class="form-control" value="{{ old('discount') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection