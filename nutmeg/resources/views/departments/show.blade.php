@extends('layouts.master')

@section('title')
{{ $department ? $department->name : 'Department not found' }}
@endsection

@section('content')
    @if(!$department)
        Department not found. <a href='/departments'>Check out the other departments available...</a>
    @else
    <h1 dusk='department-name-heading'>{{ $department->name }}</h1>
        <h3>Name: {{ $department->name }}</h3>
    </div>
    @endif
@endsection
