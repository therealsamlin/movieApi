<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function path()
    {
        return '/item/' . $this->id;
    }

    public function addReview(Review $review, $userId)
    {
        $review->user_id = $userId;
        return $this->reviews()->save($review);
    }
}
