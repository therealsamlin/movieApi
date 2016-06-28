<?php

namespace App\Http\Controllers;


use App\Item;
use Illuminate\Http\Request
    , App\Review
    , Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'body' => 'required|min:10'
        ]);

        $item = Item::find($request->item_id);

        $review = new Review($request->all());
        // add user 1 to review, hard coded now with sign in it'll be Auth::user() or Auth::id()
        $item->addReview($review, Auth::id());


        return back();
    }

    public function edit(Review $review)
    {
        return view('review.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $review->update([$request->body]);

        return back();
    }
}
