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
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->name != 'Admin')
                            <a href="{{ route('userprofile') }}" class="mx-4">
                                <img src="{{ asset('home/img/icons/man.png') }}" alt="Account">
                                <span class="mt-3">Account</span>
                            </a>
                            <a href="{{ route('addtocart') }}">
                                <img src="{{ asset('home/img/icons/bag.png') }}" alt="Keranjang">
                                <span class="mt-3">Cart</span>
                            </a>
                        @endif
                </div>
            @endauth
            @endif

            <nav class="main-menu mobile-menu">
                <ul>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="/">Home</a></li>
                            <li><a href="">Product</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('allcategory') }}">All Product</a></li>
                                    @foreach ($categories as $c)
                                        <li><a href="{{ route('category', [$c->id, $c->slug]) }}">Snack
                                                {{ $c->name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                @if (Auth::user()->name == 'Admin')
                            <li><a href="{{ route('admindashboard') }}">Admin</a></li>
                        @endif
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('allcategory') }}">All Product</a></li>
                    @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>
