<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{

    /**
     * Get all of the Collection's Lists.
     */
    public function lists()
    {
        return $this->belongsToMany('App\List')
            ->withTimestamps();
    }

    /**
     * Get all of the Collection's Items.
     */
    public function items()
    {
        return $this->belongsToMany('App\Item')
            ->withTimestamps();
    }
}
