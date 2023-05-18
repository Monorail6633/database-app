@extends('layout')
@section('title', 'Serial Number Index')
@section('content')
    <h1>Serial Numbers</h1>
    <a href="{{ route('serial_numbers.create') }}" class="btn btn-primary">Create Serial Number</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Serial No</th>
                <th>Price</th>
                <th>Prod Date</th>
                <th>Warranty Start</th>
                <th>Warranty Duration</th>
                <th>Used</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($serialNumbers as $serialNumber)
                <tr>
                    <td>{{ $serialNumber->id }}</td>
                    <td>{{ $serialNumber->product_id }}</td>
                    <td>{{ $serialNumber->serial_no }}</td>
                    <td>{{ $serialNumber->price }}</td>
                    <td>{{ $serialNumber->prod_date }}</td>
                    <td>{{ $serialNumber->warranty_start }}</td>
                    <td>{{ $serialNumber->warranty_duration }}</td>
                    <td>{{ $serialNumber->used ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('serial_numbers.edit', $serialNumber->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('serial_numbers.destroy', $serialNumber->id) }}" method="POST" style="display: inline-block;">
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