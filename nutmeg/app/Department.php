<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Return the items that belong to this Department
     *
     * @return Collection
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
