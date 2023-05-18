<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    
    public function create()
    {
        return view('items.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'model_no' => 'required',
            'stock' => 'required|integer',
        ]);
    
        $item = Item::create($data);
    
        return redirect()->route('items.index')->with('success', 'Item created successfully');
    }
    
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'model_no' => 'required',
            'stock' => 'required|integer',
        ]);

        $item->update($data);

        return redirect()->route('items.index')->with('success', 'Item updated successfully');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully');
    }
}    
