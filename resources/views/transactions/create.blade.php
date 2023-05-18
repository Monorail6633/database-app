@extends('layout')
@section('title', 'Add Transaction')
@section('content')
    <h1>Create Transaction</h1>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="customer_vendor">Customer/Vendor:</label>
            <input type="text" name="customer_vendor" id="customer_vendor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="trans_type">Transaction Type:</label>
            <select name="trans_type" id="trans_type" class="form-control" required>
                <option value="sales">Sales</option>
                <option value="purchase">Purchase</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection