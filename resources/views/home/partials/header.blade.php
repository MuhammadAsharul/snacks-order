@php
    $categories = App\Models\Category::latest()->get();
@endphp
<header class="header-section">
    <div class="container-fluid">
        <div class="inner-header">
            <div class="logo">
                <a href="/"><img src="{{ asset('dashboard/assets/img/favicon/logo.png') }}" alt=""></a>
            </div>
            <div class="header-right">
                <img src="{{ asset('home/img/icons/search.png') }}" alt="" class="search-trigger">
                <a href="{{ route('userprofile') }}">
                    <img src="{{ asset('home/img/icons/man.png') }}" alt=""></a>
                <a href="{{ route('addtocart') }}">
                    <img src="{{ asset('home/img/icons/bag.png') }}" alt="">
                </a>
            </div>

            <nav class="main-menu mobile-menu">
                <ul>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="/">Home</a></li>
                            <li><a href="">Category</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('allcategory') }}">All Category</a></li>
                                    @foreach ($categories as $c)
                                        <li><a href="{{ route('category', [$c->id, $c->slug]) }}">Snack
                                                {{ $c->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
