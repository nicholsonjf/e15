<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class PopulationController extends Controller
{
    /**
    * GET /population
    */
    public function index()
    {
        $populations_file = Storage::disk('local')->get('world-population-2019.json');
        $populations_data = json_decode($populations_file, true);
        return view('population.index')->with(['populations' => $populations_data]);
    }
}
