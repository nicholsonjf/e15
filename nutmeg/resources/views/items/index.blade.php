@extends('layouts.master')

@section('title')
    Items
@endsection

@section('content')
    <h1>Items</h1>
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
