@extends('layouts.master')

@section('content')

    <div class="text-center">

        <form class='form-signin' method='POST' action='{{ route('login') }}'>

            {{ csrf_field() }}
            <img class="mb-4" src="/images/nutmeg-icon.jpg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <div class="mb-3">Don’t have an account? <a href='/register'>Register here...</a></div>
            <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" name="email" class="form-control" value='{{ old('email') }}'
                placeholder="Email" required autofocus>
            @include('includes.error-field', ['fieldName' => 'email'])

            <label for="password" class="sr-only">Password</label>
            <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
            @include('includes.error-field', ['fieldName' => 'password'])

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                </label>
            </div>

            <button type='submit' class="btn btn-lg btn-primary btn-block">Login</button>

            <a class='btn btn-link' href='{{ route('password.request') }}'>Forgot Your Password?</a>

        </form>
    </div>

@endsection
