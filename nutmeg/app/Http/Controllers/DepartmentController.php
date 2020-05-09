<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Return the Ttems that belong to this Department
     *
     * @return Collection
     */
    public function items()
    {
        return $this->hasMany('App\Items');
    }
}
