@extends('layouts.master')

@section('title')
    Book Library...
@endsection

@section('content')
    @if(count($books) == 0)
        No books have been added...
    @else
        @foreach($books as $book)
            {{ $book['title'] }}
        @endforeach
    @endif
@endsection
