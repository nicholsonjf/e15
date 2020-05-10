<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /**
     * Gets Items belonging to a Collection.
     *
     * @return Collection
     */
    public function items()
    {
        return $this->belongsToMany('App\Item')
            ->withTimestamps();
    }
}
