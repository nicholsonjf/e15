@extends('layouts.master')

@section('title')
Create a new Collection
@endsection

@section('content')

<form action='/collections' method='POST'>
    @csrf
    <div class='row pt-4 pb-2'>
        <div class='col-3'>
            <h3>Name</h3>
            <div class='form-group'>
                <input type="text" name="name" class="form-control" id="shopping-list-name" placeholder="Enter name">
            </div>
            <button type='submit' class='btn btn-primary'>Submit</button>
        </div>
    </div>
</form>

@endsection
