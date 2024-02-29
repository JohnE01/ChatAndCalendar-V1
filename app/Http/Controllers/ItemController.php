<?php

// app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        $items = Item::all();
        return view('items.create', compact('items'));
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }
}
