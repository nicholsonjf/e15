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
        return view('population.index')->with([
            'populations' => $populations_data,
            'difficulty' => session('difficulty', null),
            'country' => session('country', null),
            'guess' => session('guess', null),
            'answered_correctly' => session('answered_correctly', null)
            ]);
    }

    public function guess(Request $request)
    {
        $difficulty = intval($request->input('difficulty'));
        $difficulty_constant = $difficulty / 100;
        $guess = intval($request->input('guess'));
        $buffer = $guess * $difficulty_constant;
        $populations_file = Storage::disk('local')->get('world-population-2019-keyed.json');
        $populations_data = json_decode($populations_file, true);
        $actual_population = intval(str_replace(',', '', $populations_data[$request->input('country')]['population']));
        $answered_correctly = ($actual_population - $buffer) <= $guess && $guess <= ($actual_population + $buffer);
        return redirect('/population')->with([
            'difficulty' => $request->input('difficulty'),
            'guess' => $request->input('guess'),
            'country' => $request->input('country'),
            'answered_correctly' => $answered_correctly
        ]);
    }
}
