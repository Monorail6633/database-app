@extends('layouts')
@section('title', 'Show Transaction Details')
@section('content')
    <h1>Transaction Detail Details</h1>
    <p><strong>ID:</strong> {{ $transactionDetail->id }}</p>
    <p><strong>Transaction ID:</strong> {{ $transactionDetail->transaction_id }}</p>
    <p><strong>Product ID:</strong> {{ $transactionDetail->product_id }}</p>
    <p><strong>Serial No:</strong> {{ $transactionDetail->serial_no }}</p>
    <p><strong>Price:</strong> {{ $transactionDetail->price }}</p>
    <p><strong>Discount:</strong> {{ $transactionDetail->discount }}</p>
    <a href="{{ route('transaction_details.index') }}" class="btn btn-primary">Back</a>
@endsection