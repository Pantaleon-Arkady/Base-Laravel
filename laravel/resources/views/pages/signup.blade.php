@extends('layouts.app')

@section('content')

    <div class="bg-success">
        
        <form class="d-flex flex-column" method="POST" action="/register">
            @csrf
            <input type="text" name="name" placeholder="Create username..." />
            <input type="email" name="email" placeholder="Enter email..." />
            <input type="password" name="password" placeholder="Create password..." />
            
            <button>Register</button>
        </form>

    </div>

@endsection
