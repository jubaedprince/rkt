@extends('layouts.master')
<div class="col-md-4 col-md-offset-4">
    <form class="form" method="POST" action="/auth/login">
        {!! csrf_field() !!}



        <h1>Rubaiyat Kamal Transport</h1><br>
        <h3>Employee Login</h3>

        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div  class="form-group">
            Email
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>

        <div  class="form-group">
            Password
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <div  class="form-group">
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div  class="form-group">
            <button class="form-control" type="submit">Login</button>
        </div>
    </form>

    <div> Don't have an account? <a href="/auth/register">Register</a></div>

</div>