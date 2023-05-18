@extends('layout')
@section('title', 'Transaction Details Index')
@section('content')
    <h1>Transaction Details</h1>
    <a href="{{ route('transaction_details.create') }}" class="btn btn-primary">Create Transaction Detail</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaction ID</th>
                <th>Product ID</th>
                <th>Serial No</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactionDetails as $transactionDetail)
                <tr>
                    <td>{{ $transactionDetail->id }}</td>
                    <td>{{ $transactionDetail->transaction_id }}</td>
                    <td>{{ $transactionDetail->product_id }}</td>
                    <td>{{ $transactionDetail->serial_no }}</td>
                    <td>{{ $transactionDetail->price }}</td>
                    <td>{{ $transactionDetail->discount }}</td>
                    <td>
                        <a href="{{ route('transaction_details.edit', $transactionDetail->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('transaction_details.destroy', $transactionDetail->id) }}" method="POST" style="display: inline-block;">
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