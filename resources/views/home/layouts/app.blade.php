<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Snack Bu Ning | @yield('title')</title>
    {{-- if css not load --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/assets/img/favicon/logo.png') }}" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('home/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('home/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('home/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('home/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('home/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('home/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('home/css/style.css') }}" type="text/css">
</head>

<body class="m-0 p-0 min-h-screen">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Search model -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Header Section Begin -->
    @include('home.partials.header')
    <!-- Header End -->




    <div class="container">
        <marquee behavior="" class="py-2" direction="left" style="background-color: #22223c;"><span
                style="color:white;text-transform: uppercase;">Pemesanan
                Hanya Dilayani Untuk Wilayah Boyolali , Harap melakukan pemesanan H-2</span>
        </marquee>
        @yield('content')
    </div>
    <!-- Latest Product End -->

    <!-- Footer Section Begin -->
    @include('home.partials.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ URL::asset('home/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('home/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('home/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('home/js/jquery.slicknav.js') }}"></script>
    <script src="{{ URL::asset('home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('home/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('home/js/mixitup.min.js') }}"></script>
    <script src="{{ URL::asset('home/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
