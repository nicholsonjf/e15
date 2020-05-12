@extends('layouts.master')

@section('title')
{{ $collection ? $collection->name : 'Collection not found' }}
@endsection

@section('content')
    @if(!$collection)
        Collection not found. <a href='/collections'>Check out the other collections available...</a>
    @else
    <h1 dusk='collection-name-heading'>{{ $collection->name }}</h1>
        @foreach($items as $item)
        <a class='collection-item' href='/items/{{ $item->id }}'>
            <h3>{{ $item->name }}</h3>
        </a>
        @endforeach
    </div>
    @endif
@endsection
