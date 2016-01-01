@extends('layouts.master')
<div class="col-md-4 col-md-offset-4">
    <form class="form" method="POST" action="/auth/register">
        {!! csrf_field() !!}

        <h1>Rubaiyat Kamal Transport</h1><br>
        <h3>Apply for Account</h3>

        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="form-group">
            Name
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            Email
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            Company Name
            <input class="form-control" type="text" name="company_name" value="{{ old('company_name') }}">
        </div>

        <div class="form-group">
            Position
            <input class="form-control" type="text" name="position" value="{{ old('position') }}">
        </div>

        <div class="form-group">
            Type
            <select class="form-control"  name="type">
                <option value="user">User</option>
                <option value="viewer">Viewer</option>
            </select>
        </div>

        <div class="form-group">
            Password
            <input class="form-control" type="password" name="password">
        </div>

        <div class="form-group">
            Confirm Password
            <input class="form-control" type="password" name="password_confirmation">
        </div>

        <div class="form-group">
            <button class="form-control" type="submit">Register</button>
        </div>
    </form>
    <div> Go back to <a href="/auth/login">Login</a></div>

</div>