@extends('layouts.master')

<div class="col-md-4 col-md-offset-4">
    <form class="form" method="POST" action="/auth/login">
        {!! csrf_field() !!}
        <h1>Rubaiyat Kamal Transport</h1><br><br>
        <h3>Employee Login</h3>

        <div class="form-group">
            Email
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            Password
            <input class="form-control" type="password" name="password" id="password">
        </div>

        <div class="form-group">
            <input class="form-control" type="checkbox" name="remember"> Remember Me
        </div>

        <div class="form-group">
            <button class="form-control" type="submit">Login</button>
        </div>
    </form>
</div>