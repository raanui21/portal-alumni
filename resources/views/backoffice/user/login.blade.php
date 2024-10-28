@extends('layouts.app')
@section('content')

    <form action="{{ route('user.login') }}" method="POST" class="login-form">
        @csrf

      
        <div class="form-group">
            <label for="email" class="">Email</label>
            <input type="text" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit" class="redbtn" style="border-radius: 0%; font-size: 1rem">Login</button>
     
    </form>

@endsection