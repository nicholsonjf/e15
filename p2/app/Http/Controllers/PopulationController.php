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
        return view('index')->with([
            'populations' => $populations_data,
            'difficulty' => session('difficulty', null),
            'country' => session('country', null),
            'guess' => session('guess', null),
            'answered_correctly' => session('answered_correctly', null),
            'actual_population' => session('actual_population', null),
            'buffer' => session('buffer', null)
            ]);
    }

    public function guess(Request $request)
    {
        $request->validate([
            'difficulty' => 'required',
            'country' => 'required',
            'guess' => 'required|numeric|between:1,2000000000'
        ]);
        // Process request
        $difficulty = intval($request->input('difficulty'));
        $difficulty_constant = $difficulty / 100;
        $guess = intval($request->input('guess'));
        $buffer = $guess * $difficulty_constant;
        $populations_file = Storage::disk('local')->get('world-population-2019-keyed.json');
        $populations_data = json_decode($populations_file, true);
        $actual_population = intval(str_replace(',', '', $populations_data[$request->input('country')]['population']));
        $answered_correctly = ($actual_population - $buffer) <= $guess && $guess <= ($actual_population + $buffer);
        return redirect('/' . '#results')->with([
            'difficulty' => $request->input('difficulty'),
            'guess' => $request->input('guess'),
            'country' => $request->input('country'),
            'actual_population' => $actual_population,
            'buffer' => $buffer,
            'answered_correctly' => $answered_correctly
        ]);
    }
}
