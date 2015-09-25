@extends('layouts.no-menu')
@section('content')
<div class="form-fields login">
    <form method="POST" action="/auth/login">
        {{ csrf_field() }}

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="{{ Input::old('email') }}">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <label for="remember">Remember Me</label>
            <input type="checkbox" name="remember" id="remember">
            <button type="submit" class="submit">Login</button>
        </div>
    </form>
</div>
@stop