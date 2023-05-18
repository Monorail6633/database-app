@extends('layout')
@section('title', 'Transaction Index')
@section('content')
    <h1>Transactions</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Create Transaction</a>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Customer/Vendor</th>
                <th>Transaction Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ $transaction->customer_vendor }}</td>
                    <td>{{ $transaction->trans_type }}</td>
                    <td>
                        <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline">
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