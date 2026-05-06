@props(['setLogin' => true])

@extends('layouts.app')

@section('content')

    <div class="bg-success">

        @if ($mode === 'login')

            <form class="d-flex flex-column" method="POST" action="/login">
                <div>Login</div>
                @csrf
                <input type="text" name="namemail" placeholder="Username or Email..." />
                <input type="password" name="password" placeholder="Password..." />
                
                <button>Login</button>
            </form>
        
            <div class="bg-light">
                <span>Don't have an account yet?</span>
                <a href="/signup/register" class="btn btn-success">
                    Register
                </a>
            </div>
        @else

            <form class="d-flex flex-column" method="POST" action="/register">
                <div>Register</div>
                @csrf
                <input type="text" name="name" placeholder="Create username..." />
                <input type="email" name="email" placeholder="Enter email..." />
                <input type="password" name="password" placeholder="Create password..." />
                
                <button>Register</button>
            </form>

            <div class="bg-light">
                <a href="/signup/login" class="btn btn-success">
                    Log in ?
                </a>
            </div>

        @endif

    </div>

@endsection
