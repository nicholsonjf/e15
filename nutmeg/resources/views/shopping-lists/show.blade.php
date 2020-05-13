@extends('layouts.master')

@section('title')
{{ $shopping_list ? $shopping_list->name : 'Shopping list not found' }}
@endsection

@section('content')
    @if(!$shopping_list)
        Shopping list not found. <a href='/shopping-lists'>Check out the other shopping lists available...</a>
    @else
    <h1 dusk='shopping-list-name-heading'>{{ $shopping_list->name }}</h1>
        <form action='/shopping-lists/{{ $shopping_list->id }}/add-item' method='POST'>
        @csrf
            <div class='form-inline mb-4'>
                <div class='form-group'>
                    <select name='item' id='item-select' class='form-control'>
                        <option value=''>--Add an item to your list--</option>
                        @foreach($items as $item)
                            <option value='{{ $item->id }}'>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <button type="submit" class="btn btn-primary ml-3">Add Item</button>
                </div>
            </div>
        </form>
        @foreach( $shopping_list->items as $shopping_list_item)
        <a class='shopping-list-item' href='/items/{{ $shopping_list_item->id }}'>
            <h3>{{ $shopping_list_item->name }}</h3>
        </a>
        @endforeach
        @foreach($collections as $collection)
        <a class='shopping-list-collection text-secondary text-decoration-none' data-toggle="collapse"
            href="#collection-item{{$collection->id}}" aria-expanded="false" aria-controls="#collection-item{{$collection->id}}">
            <h3>+{{ $collection->name }}</h3>
        </a>
        <div class="collapse" id="collection-item{{$collection->id}}">
            @foreach($collection->items as $collection_item)
            <a class='collection-item' href='/items/{{ $collection_item->id }}'>
                <h3 class="pl-4">{{ $collection_item->name }}</h3>
            </a>
            @endforeach
        <div>
        @endforeach
    </div>
    @endif
@endsection
