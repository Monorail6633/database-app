<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionDetailController extends Controller
{
    public function index()
    {
        $transactionDetails = TransactionDetail::all();
        return view('transaction_details.index', compact('transactionDetails'));
    }

    public function create()
    {
        return view('transaction_details.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'serial_no' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
        ]);

        $transactionDetail = TransactionDetail::create($data);

        return redirect()->route('transaction_details.index')->with('success', 'Transaction detail created successfully');
    }

    public function edit($id)
    {
        $transactionDetail = TransactionDetail::findOrFail($id);
        return view('transaction_details.edit', compact('transactionDetail'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'serial_no' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
        ]);

        $transactionDetail = TransactionDetail::findOrFail($id);
        $transactionDetail->update($data);

        return redirect()->route('transaction_details.index')->with('success', 'Transaction detail updated successfully');
    }

    public function destroy($id)
    {
        $transactionDetail = TransactionDetail::findOrFail($id);
        $transactionDetail->delete();

        return redirect()->route('transaction_details.index')->with('success', 'Transaction detail deleted successfully');
    }
}