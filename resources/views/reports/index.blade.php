@extends('layout')
@section('title', 'Report')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Sales Transactions</h2>
            <ul class="list-group">
                @foreach ($salesTransactions as $transaction)
                    @if ($transaction->trans_type === 'sales')
                        <li class="list-group-item">{{ $transaction->id }} - {{ $transaction->date }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Purchase Transactions</h2>
            <ul class="list-group">
                @foreach ($purchaseTransactions as $transaction)
                    @if ($transaction->trans_type === 'purchase')
                        <li class="list-group-item">{{ $transaction->id }} - {{ $transaction->date }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Available Stock Items</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($availableItems as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection