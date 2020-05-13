@extends('layouts.master')

@section('title')
    Collections
@endsection

@section('content')
    <h1>Collections</h1>
    <a class="text-decoration-none text-success" href="/collections/create">
        <h6>+add a new collection</h6>
    </a>
    @if(count($collections) == 0)
        No collections have been added yet...
    @else
    <div id='collections'>
        @foreach($collections as $collection)
        <a class='collection' href='/collections/{{ $collection->id }}'>
            <h3>{{ $collection->name }}</h3>
        </a>
        @endforeach
    </div>
    @endif
@endsection
