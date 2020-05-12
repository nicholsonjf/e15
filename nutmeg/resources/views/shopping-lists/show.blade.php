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
        <a class='shopping-list-collection text-success' data-toggle="collapse" href="#collection-item{{$collection->id}}"
            aria-expanded="false" aria-controls="#collection-item{{$collection->id}}">
            <h3>+{{ $collection->name }}</h3>
        </a>
        <div class="collapse" id="collection-item{{$collection->id}}">
            @foreach($collection->items as $item)
            <a class='collection-item' href='/items/{{ $item->id }}'>
                <h3 class="pl-4">{{ $item->name }}</h3>
            </a>
            @endforeach
        <div>
        @endforeach
    </div>
    @endif
@endsection
