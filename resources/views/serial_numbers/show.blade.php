@extends('layout')
@section('title', 'Show Serial')
@section('content')
    <h1>Serial Number Details</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $serialNumber->id }}</td>
        </tr>
        <tr>
            <th>Product ID</th>
            <td>{{ $serialNumber->product_id }}</td>
        </tr>
        <tr>
            <th>Serial No</th>
            <td>{{ $serialNumber->serial_no }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $serialNumber->price }}</td>
        </tr>
        <tr>
            <th>Prod Date</th>
            <td>{{ $serialNumber->prod_date }}</td>
        </tr>
        <tr>
            <th>Warranty Start</th>
            <td>{{ $serialNumber->warranty_start }}</td>
        </tr>
        <tr>
            <th>Warranty Duration</th>
            <td>{{ $serialNumber->warranty_duration }}</td>
        </tr>
        <tr>
            <th>Used</th>
            <td>{{ $serialNumber->used ? 'Yes' : 'No' }}</td>
        </tr>
    </table>
    <a href="{{ route('serial_numbers.edit', $serialNumber->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('serial_numbers.destroy', $serialNumber->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
