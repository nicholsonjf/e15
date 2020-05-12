@extends('layouts.master')

@section('title')
    Shopping Lists
@endsection

@section('content')
    <h1>Shopping Lists</h1>
    <a class="text-decoration-none text-success" href="/shopping-lists/create">
        <h6>+create new shopping list</h6>
    </a>
    @if(count($shopping_lists) == 0)
        No shopping lists have been added yet...
    @else
    <div id='shopping-lists'>
        @foreach($shopping_lists as $shopping_list)
        <a class='shopping-list' href='/shopping-lists/{{ $shopping_list->id }}'>
            <h3>{{ $shopping_list->name }}</h3>
        </a>
        @endforeach
    </div>
    @endif
@endsection
