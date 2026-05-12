@props(['setLogin' => true])

@extends('layouts.app')

@section('content')

    <div class="signup_main_div bg-secondary border border-2 border-black">

        <div class="d-none d-md-flex signup_banner_div">
            Left sign up
        </div>
        <div class="sign_up_content_div">
            @if ($mode === 'login')

                <div class="signup_content_wrapper">
                    <form class="signup_forms_element d-flex flex-column" method="POST" action="/login">
                        <div class="signup_forms_header">Login</div>
                        @csrf
                        <input class="signup_inputs" type="text" name="namemail" placeholder="Username or Email..." />
                        <input class="signup_inputs" type="password" name="password" placeholder="Password..." />
                        
                        <button class="btn btn-success mt-3">Login</button>
                    </form>
                
                    <div class="signup_toggle mt-4">
                        <span>Don't have an account yet?</span>
                        <a href="/signup/register" class="btn btn-success">
                            Register
                        </a>
                    </div>
                </div>
                
            @else

                <div class="signup_content_wrapper">
                    <form class="signup_forms_element d-flex flex-column" method="POST" action="/register">
                        <div class="signup_forms_header">Register</div>
                        @csrf
                        <input class="signup_inputs" type="text" name="name" placeholder="Create username..." />
                        <input class="signup_inputs" type="email" name="email" placeholder="Enter email..." />
                        <input class="signup_inputs" type="password" name="password" placeholder="Create password..." />
                        
                        <button class="btn btn-success mt-3">Register</button>
                    </form>

                    <div class="signup_toggle mt-4">
                        <span>Already have an account?</span>
                        <a href="/signup/login" class="btn btn-success">
                            Log in ?
                        </a>
                    </div>
                </div>

            @endif
        </div>

    </div>

@endsection
