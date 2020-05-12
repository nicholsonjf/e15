@extends('layouts.master')

@section('title')
    Departments
@endsection

@section('content')
    <h1>Departments</h1>
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
