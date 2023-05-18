<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $transactionType = $request->input('transaction_type');
        
        $salesTransactions = Transaction::where('trans_type', 'sales')->get();
        
        $purchaseTransactions = Transaction::where('trans_type', 'purchase')->get();
        
        $availableItems = Item::where('stock', '>', 0)->get();
        
        return view('reports.index', compact('salesTransactions', 'purchaseTransactions', 'availableItems'));
    }
}