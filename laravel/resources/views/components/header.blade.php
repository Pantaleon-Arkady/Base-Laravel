@props(['homePage' => true])

<div class="header_main_div p-2 bg-black text-white">
    <div class="fw-bold fs-1">Base Laravel</div>

    @if ($homePage)
        <div>
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
        </div>
    @endif
</div>