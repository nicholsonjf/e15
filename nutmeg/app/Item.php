<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'department_id' => null,
    ];


    /**
     * Get all of the Items's Lists.
     */
    public function lists()
    {
        return $this->belongsToMany('App\ShoppingList')->withPivot('checked')
            ->withTimestamps();
    }

    /**
     * Returns the Department the Item belongs to.
     *
     * @return 'App\Department'
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Returns the collections an item belongs to.
     *
     * @return Collection
     */
    public function collections()
    {
        return $this->belongsToMany('App\Collections')
            ->withTimestamps();
    }
}
