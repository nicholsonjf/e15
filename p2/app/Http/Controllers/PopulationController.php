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
        $populations_file = Storage::disk('local')->get('world-population-2019-keyed.json');
        $populations_data = json_decode($populations_file, true);
        ksort($populations_data);
        $country_names_sorted = array_keys($populations_data);
        return view('index')->with([
            'country_names_sorted' => $country_names_sorted,
            'difficulty' => session('difficulty', null),
            'country_choice' => session('country_choice', null),
            'guess' => session('guess', null),
            'answered_correctly' => session('answered_correctly', null),
            'actual_population' => session('actual_population', null),
            'allowed_difference' => session('allowed_difference', null)
            ]);
    }

    public function guess(Request $request)
    {
        $request->validate([
            'difficulty' => 'required',
            'country_choice' => 'required',
            'guess' => 'required|numeric|between:1,2000000000'
        ]);
        // Process request
        $difficulty = intval($request->input('difficulty'));
        $difficulty_constant = $difficulty / 100;
        $guess = intval($request->input('guess'));
        $populations_file = Storage::disk('local')->get('world-population-2019-keyed.json');
        $populations_data = json_decode($populations_file, true);
        $actual_population = intval(str_replace(',', '', $populations_data[$request->input('country_choice')]['population']));
        $allowed_difference = $actual_population * $difficulty_constant;
        $guess_difference = abs($actual_population - $guess);
        $answered_correctly = $guess_difference <= $allowed_difference;
        return redirect('/' . '#results')->with([
            'difficulty' => $request->input('difficulty'),
            'guess' => $request->input('guess'),
            'country_choice' => $request->input('country_choice'),
            'actual_population' => $actual_population,
            'allowed_difference' => $allowed_difference,
            'answered_correctly' => $answered_correctly
        ]);
    }
}
