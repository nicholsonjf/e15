@extends('layouts.master')

@section('title')
    Items
@endsection

@section('content')
    <h1>Items</h1>
    <a class="text-decoration-none text-success" href="/items/create">
        <h6>+add a new item</h6>
    </a>
    @if(count($items) == 0)
        No items have been added yet...
    @else
    <div id='items'>
        @foreach($items as $item)
        <a class='item' href='/items/{{ $item->id }}'>
            <h3>{{ $item->name }}</h3>
        </a>
        @endforeach
    </div>
    @endif
@endsection
