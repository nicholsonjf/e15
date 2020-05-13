<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Department;
use Illuminate\Http\Request;

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


    /**
     * GET /departments/create
     * Create a new department
     */
    public function create()
    {
        return view('departments.create');
    }


    /**
     * POST /departments
     * Store a new department
     */
    public function store(Request $request)
    {
        $newDepartment = new Department();
        $params = $request->all();
        $newDepartment->name = $params['name'];
        $saveResult = $newDepartment->save();
        if (true === $saveResult) {
            return redirect('/departments/' . $newDepartment->id)
                ->with(['flash-alert' => 'Your department ' . $params['name'] . ' was added.']);
        }

    }
}
