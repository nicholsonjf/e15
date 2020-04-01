@extends('layouts.master')

@section('title')
'The Population Game!'
@endsection

@section('content')
@if(count($errors) > 0)
    <div class='row'>
        <div class='col-6 pl-3 ml-3 mt-4 alert alert-danger'>
            ATTENTION:
            <ul class='mb-0'>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<form action='/guess' method='GET'>
    <div class='row pt-4 pb-2'>
        <div class='col'>
            <h3>Country</h3>
            <div class='form-group'>
                <p class='mb-2'>Choose the country you want to guess the population of.</p>
                <select name='country_choice' id='country-select' class='form-control'>
                    <option value=''>--Please choose an option--</option>
                    @foreach($country_names_sorted as $country_name)
                        <option
                            value='{{ $country_name }}'
                            {{ $country_choice == $country_name ? ' selected' : '' }}
                        >
                            {{ $country_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class='row pb-4'>
        <div class='col'>
            <h3>Difficulty Level</h3>
            <div class='pb-2'>
                <p class='mb-n1'>Set your difficulty.</p>
                <small class='text-muted'>
                    Hard = within 5%, Medium = within 10%, and Easy = within 25%
                </small>
            </div>
            <div class='form-check'>
                <input
                    class='form-check-input'
                    type='radio'
                    id='difficulty25'
                    name='difficulty'
                    value='25'
                    {{ $difficulty == '25' || is_null($difficulty) ? ' checked' : ''}}
                >
                <label for='difficulty25' class='form-check-label'>Easy</label>
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
                    id='difficulty5'
                    name='difficulty'
                    value='5'
                    {{ $difficulty == '5' ? ' checked' : ''}}
                >
                <label for='difficulty5' class='form-check-label'>Hard</label>
            </div>
        </div>
    </div>

    <div class='row pb-4'>
        <div class='col'>
            <div class='form-group'>
                <h3>Your Guess</h3>
                <p class='mb-n1'>Guess the population:</p>
                <small class='text-muted'>
                    Your guess can only contain numbers.
                </small>
                <div class='row pt-3 pl-3'>
                    <input
                        class='form-control'
                        placeholder='e.g. 25000000'
                        type='text'
                        id='guess'
                        name='guess'
                        value='{{ $guess }}'
                    >
                </div>
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
    <div id='results'>
    @if($answered_correctly == true)
        <div class='results alert alert-success'>
            Correct! Your guess was within {{strval($difficulty) . '%'}} ({{$allowed_difference}}) of {{$actual_population}}, the current population of {{$country_choice}}.
        </div>
    @else
        <div class='results alert alert-danger'>
            Incorrect! Your guess was not within {{strval($difficulty) . '%'}} ({{$allowed_difference}}) of the current population of {{$country_choice}}.
        </div>
    @endif
    </div>
@endif

@endsection
