@extends('layouts.master')

@section('title')
'Population Guesser'
@endsection

@section('content')
<form action='/population/guess' method='GET'>
    <div>
        <h3>Country</h3>
        <label for='country-select'>Choose a country:</label>
        <select name='country' id='country-select'>
            <option value=''>--Please choose an option--</option>
            @foreach($populations as $population)
                <option
                    value='{{ trim($population['country']) }}'
                    {{ ($country == trim($population['country']) ) ? ' selected' : '' }}
                >
                    {{ $population['country'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <h3>Difficulty</h3>
        <p>Set your difficulty. If you select 5%, your guess must be within 5% of that country's population, and so on...</p>

        <input
            type='radio'
            id='difficulty5'
            name='difficulty'
            value='5'
            {{ $difficulty == '5' || is_null($difficulty) ? ' checked' : ''}}
        >
        <label for='difficulty5'>5%</label>

        <input
            type='radio'
            id='difficulty10'
            name='difficulty'
            value='10'
            {{ $difficulty == '10' ? ' checked' : ''}}
        >
        <label for='difficulty10'>10%</label>

        <input
            type='radio'
            id='difficulty25'
            name='difficulty'
            value='25'
            {{ $difficulty == '25' ? ' checked' : ''}}
        >
        <label for='difficulty25'>25%</label>
    </div>

    <div>
        <h3>Guess</h3>
        <label for='guess'>Guess the population:</label>
        <input
            type='text'
            id='guess'
            name='guess'
            value='{{ $guess }}'
        >
    </div>

    <div>
        <button type='submit'>Submit</button>
    </div>
</form>

@if(!is_null($answered_correctly))
    @if($answered_correctly == true)
        <div class='results alert alert-primary'>
            Correct!
        </div>
    @else
        <div class='results alert alert-primary'>
            Incorrect!
        </div>
    @endif
@endif

@endsection
