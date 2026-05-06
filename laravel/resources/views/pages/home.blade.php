@extends('layouts.app')

@section('content')

    <div class="bg-success">

        @auth
            <p>Welcome, {{ auth()->user()->name }}</p>
        @endauth

        @guest
            <p>You are not logged in</p>
        @endguest

    </div> 

@endsection