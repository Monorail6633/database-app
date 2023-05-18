<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\SerialNumber;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'customer_vendor' => 'required',
            'trans_type' => 'required',
        ]);

        $latestTransaction = Transaction::latest('id')->first();
        $newTransactionId = $latestTransaction ? $latestTransaction->id + 1 : 1;
        $data['trans_id'] = $newTransactionId;

        $transaction = Transaction::create($data);

        if ($transaction->trans_type === 'sales') {
            $this->reduceStock($transaction);
        } elseif ($transaction->trans_type === 'purchase') {
            $this->addSerialNumber($transaction);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully');
    }

    public function reduceStock($transaction)
    {
        if ($transaction->transactionDetails()->exists()) {
            foreach ($transaction->details as $detail) {
                $serialNumber = SerialNumber::where('serial_no', $detail->serial_no)->first();

                if ($serialNumber) {
                    $serialNumber->update(['used' => 1]);

                    $item = Item::find($detail->product_id);
                    if ($item) {
                        $item->decrement('stock');
                    }
                }
            }
        }
    }

    public function addSerialNumber($transaction)
    {
        if ($transaction->details) {
            foreach ($transaction->details as $detail) {
                $serialNumber = SerialNumber::create([
                    'product_id' => $detail->product_id,
                    'serial_no' => $detail->serial_no,
                    'price' => $detail->price,
                    'used' => false,
                ]);
            }
        }
    }

    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->validate([
            'customer_vendor' => 'required',
        ]);

        $oldTransId = $transaction->trans_id;
        $transaction->fill($data);

        $transaction->trans_id = $oldTransId;
        $transaction->save();

        if ($transaction->trans_type === 'sales' && is_iterable($transaction->details)) {
            foreach ($transaction->details as $detail) {
                $serialNumber = SerialNumber::where('serial_no', $detail->serial_no)->first();
                if ($serialNumber) {
                    $serialNumber->update(['used' => 1]);

                    $item = Item::find($detail->product_id);
                    if ($item) {
                        $item->decrement('stock');
                    }
                }
            }
        } elseif ($transaction->trans_type === 'purchase') {
            foreach ($transaction->details as $detail) {
                SerialNumber::create([
                    'product_id' => $detail->product_id,
                    'serial_no' => $detail->serial_no,
                    'price' => $detail->price,
                    'used' => false,
                ]);

                $item = Item::find($detail->product_id);
                $item->increment('stock');
            }
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully');
    }

    public function destroy(Transaction $transaction)
    {
        if ($transaction->trans_type === 'sales') {
            $this->restoreStock($transaction);
        } elseif ($transaction->trans_type === 'purchase') {
            $this->deleteSerialNumbers($transaction);
        }

        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }

    private function restoreStock($transaction)
    {
        if ($transaction->details()->exists()) {
            foreach ($transaction->details as $detail) {
                $serialNumber = SerialNumber::where('serial_no', $detail->serial_no)->first();

                if ($serialNumber) {
                    $serialNumber->update(['used' => 0]);

                    $item = Item::find($detail->product_id);
                    if ($item) {
                        $item->increment('stock');
                    }
                }
            }
        }
    }

    private function deleteSerialNumbers($transaction)
    {
        if ($transaction->transactionDetails()->exists()) {
            foreach ($transaction->details as $detail) {
                $serialNumber = SerialNumber::where('serial_no', $detail->serial_no)->first();

                if ($serialNumber) {
                    $serialNumber->delete();
                }
            }
        }
    }
    public function graphs()
    {
        $monthlyData = $this->getMonthlyData();
        $dailyProfitData = $this->getDailyProfitData();

        return view('transactions.graphs', compact('monthlyData', 'dailyProfitData'));
    }


    private function getMonthlyData()
    {
        // Retrieve the sales and purchase transactions for the desired month
        $transactions = Transaction::whereMonth('date', now()->month)->get();
    
        // Prepare the monthly data for the graph
        $labels = [];
        $sales = [];
        $purchases = [];
    
        // Calculate the total sales and purchases for each day of the month
        $daysInMonth = now()->daysInMonth;
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $labels[] = $day;
    
            $salesTotal = $transactions->where('trans_type', 'sales')
                ->filter(function ($transaction) use ($day) {
                    return $transaction->date->day === $day;
                })
                ->sum('price');
    
            $purchasesTotal = $transactions->where('trans_type', 'purchase')
                ->filter(function ($transaction) use ($day) {
                    return $transaction->date->day === $day;
                })
                ->sum('price');
    
            $sales[] = $salesTotal;
            $purchases[] = $purchasesTotal;
        }
    
        return [
            'labels' => $labels,
            'sales' => $sales,
            'purchases' => $purchases
        ];
    }
    
    private function getDailyProfitData()
    {
        // Retrieve the sales and purchase transactions
        $salesTransactions = Transaction::where('trans_type', 'sales')->get();
        $purchaseTransactions = Transaction::where('trans_type', 'purchase')->get();
    
        // Prepare the daily profit data for the graph
        $labels = [];
        $profits = [];
    
        // Calculate the daily profit
        $daysInMonth = now()->daysInMonth;
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $labels[] = $day;
    
            $salesTotal = $salesTransactions->filter(function ($transaction) use ($day) {
                    return $transaction->date->day === $day;
                })
                ->sum('price');
    
            $purchasesTotal = $purchaseTransactions->filter(function ($transaction) use ($day) {
                    return $transaction->date->day === $day;
                })
                ->sum('price');
    
            $profit = $salesTotal - $purchasesTotal;
    
            $profits[] = $profit;
        }
    
        return [
            'labels' => $labels,
            'profits' => $profits
        ];
    }
}