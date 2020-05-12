<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the Items the ShoppingList belongs to.
     */
    public function items()
    {
        return $this->belongsToMany('App\Item')->withPivot('checked')
            ->withTimestamps();
    }

     /**
     * Get the Collections the ShoppingList belongs to.
     */
    public function collections()
    {
        return $this->belongsToMany('App\Collection')
            ->withTimestamps();
    }
}
