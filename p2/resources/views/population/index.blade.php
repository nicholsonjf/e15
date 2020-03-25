@extends('layouts.master')

@section('title')
'Population Guesser'
@endsection

@section('content')
<form>
    <div>
        <h3>Country</h3>
        <label for="country-select">Choose a country:</label>
        <select name="country" id="country-select">
            <option value="">--Please choose an option--</option>
            @foreach($populations as $population)
                <option value={{$population['country']}}>{{$population['country']}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <h3>Guess</h3>
        <label for="guess">Guess the population:</label>
        <input type="text" id="guess" name="guess">
    </div>

    <div>
        <h3>Difficulty</h3>
        <p>Set your difficulty. If you select 5%, your guess must be within 5% of that country's population, and so on...</p>

        <input type="radio" id="difficulty5" name="difficulty" value="5">
        <label for="difficulty5">5%</label>

        <input type="radio" id="difficulty10" name="difficulty" value="10">
        <label for="difficulty10">10%</label>

        <input type="radio" id="difficulty25" name="difficulty" value="25">
        <label for="difficulty25">25%</label>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
@endsection
