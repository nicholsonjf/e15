<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * GET /departments
     * Show all the departments in the app.
     */
    public function index()
    {
        $departments = Department::orderBy('name')->get();

        return view('departments.index')->with([
            'departments' => $departments,
        ]);
    }


    /**
     * GET /departments/{slug?}
     * Show the details for an individual department
     */
    public function show($slug)
    {
        $department = Department::where('id', '=', $slug)->first();

        return view('departments.show')->with([
            'department' => $department,
            'items' => $department->items,
            'slug' => $slug,
        ]);
    }
}
