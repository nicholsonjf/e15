@extends('layouts.master')

@section('title')
{{ $item ? $item->name : 'Item not found' }}
@endsection

@section('content')
    @if(!$item)
        Item not found. <a href='/items'>Check out the other items available...</a>
    @else
    <h1 dusk='item-name-heading'>{{ $item->name }}</h1>
            <h3>
                <span class="item-label">Department:</span>
                <a class='item-department' href='/departments/{{ $department->id }}'>
                    {{ $department->name }}
                </a>
            </h3>
    @endif
@endsection
