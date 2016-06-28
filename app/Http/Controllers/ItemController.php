<?php

namespace App\Http\Controllers;

use App\Item;

class ItemController extends Controller
{


    public function index()
    {
//        not using eloquent
//        $items = \DB::table('items')->get();

        $items = Item::all();


        return view('item.index', compact('items'));
    }

    public function show(Item $item)
    {
//        one approach witho Item $item as function parameter
//        $item = Item::find($id);

        // which means "eager" load item::reviews and load reviews::user
        $item->load('reviews.user');

        return view('item.show', compact('item'));
    }
}
