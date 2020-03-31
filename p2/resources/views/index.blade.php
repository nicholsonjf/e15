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
<form action='/guess' method='GET'>
    <div class='row py-4'>
        <div class='col'>
            <h3>Country</h3>
            <div class='form-group'>
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
        </div>
    </div>

    <div class='row pb-4'>
        <div class='col'>
            <h3>Difficulty Level</h3>
            <p>Set your difficulty. If you select "Hard", your guess must be within 5% of that country's population, and so on...</p>
            <div class='form-check'>
                <input
                    class='form-check-input'
                    type='radio'
                    id='difficulty5'
                    name='difficulty'
                    value='5'
                    {{ $difficulty == '5' || is_null($difficulty) ? ' checked' : ''}}
                >
                <label for='difficulty5' class='form-check-label'>Hard</label>
            </div>
            <div class='form-check'>
                <input
                    class='form-check-input'
                    type='radio'
                    id='difficulty10'
                    name='difficulty'
                    value='10'
                    {{ $difficulty == '10' ? ' checked' : ''}}
                >
                <label for='difficulty10' class='form-check-label'>Medium</label>
            </div>
            <div class='form-check'>
                <input
                    class='form-check-input'
                    type='radio'
                    id='difficulty25'
                    name='difficulty'
                    value='25'
                    {{ $difficulty == '25' ? ' checked' : ''}}
                >
                <label for='difficulty25' class='form-check-label'>Easy</label>
            </div>
        </div>
    </div>

    <div class='row pb-4'>
        <div class='col'>
            <div class='form-group'>
                <h3>Your Guess</h3>
                <label for='guess'>Guess the population:</label>
                <input
                    class='form-control'
                    type='text'
                    id='guess'
                    name='guess'
                    value='{{ $guess }}'
                >
            </div>
        </div>
    </div>

    <div class='row pb-4'>
        <div class='col'>
            <button type='submit' class='btn btn-primary'>Submit</button>
        </div>
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
