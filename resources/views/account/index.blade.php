@extends('layouts.main')
@section('title') Личный кабинет @parent @stop
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="jumbotron">
            <h5>
                Добро пожаловать, {{ auth()->user()->name }}
                @if(Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" class="ms-2" style="width:50px;">
                @endif
            </h5>
            <h1 class="display-3">Bootstrap 5 Laravel Fortify Authentication</h1>
            <p class="lead">This is a simple auth starter setup for laravel 9 projects</p>
            <hr class="my-4">
            <h2>Features:</h2>
            <ul>
                <li>User Login</li>
                <li>User Registration</li>
                <li>Email Verification</li>
                <li>Forget Password</li>
                <li>Reset Password</li>
            </ul>
        </div>
    </div>
@endsection
