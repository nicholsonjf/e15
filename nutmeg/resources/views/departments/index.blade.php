@extends('layouts.master')

@section('title')
    Departments
@endsection

@section('content')
    <h1>Departments</h1>
    <a class="text-decoration-none text-success" href="/departments/create">
        <h6>+add a new department</h6>
    </a>
    @if(count($departments) == 0)
        No departments have been added yet...
    @else
    <div id='departments'>
        @foreach($departments as $department)
        <a class='department' href='/departments/{{ $department->id }}'>
            <h3>{{ $department->name }}</h3>
        </a>
        @endforeach
    </div>
    @endif
@endsection
