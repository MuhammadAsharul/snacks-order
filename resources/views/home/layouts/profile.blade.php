@extends('home.layouts.app')
@section('title', 'User Profile')
@section('content')
    <div class="container page-add">
        <div class="row d-flex flex-row">
            <div class="col-lg-3">
                <div class="page-breadcrumb">
                    <h2>User Profile<span>.</span></h2><br>
                    <a href="#">Profile</a>
                    <a class="active" href="#">{{ Auth::user()->name }}</a>
                </div>
                <div class="product-content order-table">
                    <ul class="p-info row">
                        <li><a href="{{ route('userprofile') }}">Dashboard</a> </li>
                        <li><a href="{{ route('pendingorders') }}">Pending Order</a></li>
                        <li><a href="{{ route('history') }}">History</a></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="product-content order-table">
                    @yield('profilecontent')
                </div>
            </div>
        </div>
    </div>
@endsection
