@extends('layouts.app')

@section('content')

    <div class="home_main_div bg-secondary">

        @auth
            <div class="home_auth_message bg-success text-white">Welcome, {{ auth()->user()->name }}</div>
        @endauth

        @guest
            <div class="home_auth_message bg-warning">You are not logged in</div>
        @endguest

    </div> 

@endsection