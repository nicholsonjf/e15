@extends('layouts.master')

@section('title')
{{ $shopping_list ? $shopping_list->name : 'Shopping list not found' }}
@endsection

@section('content')
    @if(!$shopping_list)
        Shopping list not found. <a href='/shopping-lists'>Check out the other shopping lists available...</a>
    @else
    <h1 dusk='shopping-list-name-heading'>{{ $shopping_list->name }}</h1>
        @foreach($items as $item)
        <a class='shopping-list-item' href='/items/{{ $item->id }}'>
            <h3>{{ $item->name }}</h3>
        </a>
        @endforeach
        @foreach($collections as $collection)
        <a class='shopping-list-collection text-success' href='/collections/{{ $collection->id }}'>
            <h3>+{{ $collection->name }}</h3>
        </a>
        @endforeach
    </div>
    @endif
@endsection
