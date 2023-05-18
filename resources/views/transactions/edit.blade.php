@extends('layout')
@section('title', 'Edit Transaction')
@section('content')
    <h1>Create Transaction</h1>
    <form action="{{ route('transactions.update', ['transaction' => $transaction]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_vendor">Customer/Vendor:</label>
            <input type="text" name="customer_vendor" id="customer_vendor" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection