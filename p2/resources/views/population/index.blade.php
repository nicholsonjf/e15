@extends('layouts.master')

@section('title')
'Population Guesser'
@endsection

@section('content')
@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action='/population/guess' method='GET'>
    <div class='form-group'>
        <h3>Country</h3>
        <label for='country-select'>Choose a country:</label>
        <select name='country' id='country-select' class='form-control'>
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

    <div class='form-check'>
        <h3>Difficulty</h3>
        <p>Set your difficulty. If you select 5%, your guess must be within 5% of that country's population, and so on...</p>

        <input
            class='form-check-input'
            type='radio'
            id='difficulty5'
            name='difficulty'
            value='5'
            {{ $difficulty == '5' || is_null($difficulty) ? ' checked' : ''}}
        >
        <label for='difficulty5' class='form-check-label'>5%</label>

        <input
            class='form-check-input'
            type='radio'
            id='difficulty10'
            name='difficulty'
            value='10'
            {{ $difficulty == '10' ? ' checked' : ''}}
        >
        <label for='difficulty10' class='form-check-label'>10%</label>

        <input
            class='form-check-input'
            type='radio'
            id='difficulty25'
            name='difficulty'
            value='25'
            {{ $difficulty == '25' ? ' checked' : ''}}
        >
        <label for='difficulty25' class='form-check-label'>25%</label>
    </div>

    <div class='form-group'>
        <h3>Guess</h3>
        <label for='guess'>Guess the population:</label>
        <input
            class='form-control'
            type='text'
            id='guess'
            name='guess'
            value='{{ $guess }}'
        >
    </div>

    <div class='form-group'>
        <button type='submit' class='form-control'>Submit</button>
    </div>
</form>

@if(!is_null($answered_correctly))
    @if($answered_correctly == true)
        <div class='results alert alert-success'>
            Correct!
        </div>
    @else
        <div class='results alert alert-danger'>
            Incorrect!
        </div>
    @endif
@endif

@endsection
