@extends('layouts.master')

@section('title')
Create a New Shopping List
@endsection

@section('content')
@if(count($errors) > 0)
    <div class='row mr-4'>
        <div class='col-10 pl-3 ml-3 mt-4 alert alert-danger'>
            ATTENTION:
            <ul class='mb-0'>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<form action='/items' method='GET'>
    <div class='row pt-4 pb-2'>
        <div class='col-3'>
            <h3>Name</h3>
            <div class='form-group'>
                <input type="text" class="form-control" id="shopping-list-name" placeholder="Enter name">
            </div>

            <h3>Department</h3>
            <div class='form-group'>
                <select name='dept_choice' id='dept-select' class='form-control'>
                    <option value=''>--Please choose an option--</option>
                    @foreach($departments as $department)
                        <option value='{{ $department->id }}'>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</form>
@endsection

