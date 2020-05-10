<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    /**
     * Get the Items the List belongs to.
     */
    public function items()
    {
        return $this->belongsToMany('App\Item');
    }

     /**
     * Get the Collections the List belongs to.
     */
    public function collections()
    {
        return $this->belongsToMany('App\Collection');
    }
}
