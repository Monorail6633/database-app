@extends('layout')
@section('title', 'SHow Transaction')
@section('content')
    <h1>Transaction Details</h1>
    <p><strong>ID:</strong> {{ $transaction->id }}</p>
    <p><strong>Date:</strong> {{ $transaction->date }}</p>
    <p><strong>Customer/Vendor:</strong> {{ $transaction->customer_vendor }}</p>
    <p><strong>Transaction Type:</strong> {{ $transaction->trans_type }}</p>
    <!-- Display more details as needed -->
    <a href="{{ route('transactions.index') }}" class="btn btn-primary">Back to Transactions</a>
@endsection