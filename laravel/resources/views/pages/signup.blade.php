@props(['setLogin' => true])

@extends('layouts.app')

@section('content')

    <div class="bg-success">

        @if ($setLogin)

            <form class="d-flex flex-column" method="POST" action="/login">
                <div>Login</div>
                @csrf
                <input type="text" name="namemail" placeholder="Username or Email..." />
                <input type="password" name="password" placeholder="Password..." />
                
                <button>Login</button>
            </form>
        
        @else

            <form class="d-flex flex-column" method="POST" action="/register">
                <div>Register</div>
                @csrf
                <input type="text" name="name" placeholder="Create username..." />
                <input type="email" name="email" placeholder="Enter email..." />
                <input type="password" name="password" placeholder="Create password..." />
                
                <button>Register</button>
            </form>

        @endif

    </div>

    <button onclick="() => setLogin(false)">
        Register
    </button>

@endsection
