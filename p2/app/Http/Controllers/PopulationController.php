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

    public function guess(Request $request)
    {
        $difficulty = intval($request->all()['difficulty']);
        $percentage = $difficulty / 100
        $guess = intval($request->all()['guess']);
        dd($difficulty);
        $populations_file = Storage::disk('local')->get('world-population-2019.json');
        $populations_data = json_decode($populations_file, true);
        dd($populations_data);
        return 'you guessed it!';
    }
}
