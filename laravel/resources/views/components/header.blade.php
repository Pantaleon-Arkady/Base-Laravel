@props(['homePage' => true])

<div class="bg-primary">
    Header as component

    @if ($homePage)
    
        @auth
            <a class="btn btn-danger" href="/logout">
                Logout
            </a>
        @endauth

        @guest
            <a class="btn btn-success" href="/signup/login">
                Sign in
            </a>
        @endguest

    @endif
</div>