<?php

namespace App\Http\Controllers;

use App\Models\SerialNumber;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SerialNumberController extends Controller
{
    public function index()
    {
        $serialNumbers = SerialNumber::all();
        return view('serial_numbers.index', compact('serialNumbers'));
    }

    public function create()
    {
        return view('serial_numbers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'serial_no' => 'required|unique:serial_numbers',
            'price' => 'required|numeric',
            'prod_date' => 'required|date',
            'warranty_start' => 'required|date',
            'warranty_duration' => 'required|integer',
            'used' => 'required|boolean',
        ]);

        $serialNumber = SerialNumber::create($data);

        return redirect()->route('serial_numbers.index')->with('success', 'Serial number created successfully');
    }

    public function edit($id)
    {
        $serialNumber = SerialNumber::findOrFail($id);
        return view('serial_numbers.edit', compact('serialNumber'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'serial_no' => 'required|unique:serial_numbers',
            'price' => 'required|numeric',
            'prod_date' => 'required|date',
            'warranty_start' => 'required|date',
            'warranty_duration' => 'required|integer',
            'used' => 'required|boolean',
        ]);

        $serialNumber = SerialNumber::findOrFail($id);
        $serialNumber->update($data);

        return redirect()->route('serial_numbers.index')->with('success', 'Serial number updated successfully');
    }

    public function destroy($id)
    {
        $serialNumber = SerialNumber::findOrFail($id);
        $serialNumber->delete();

        return redirect()->route('serial_numbers.index')->with('success', 'Serial number deleted successfully');
    }
}
