@extends('home.layouts.profile')
@section('title', 'User Profile')
@section('profilecontent')
    <b>Email : </b> {{ Auth::user()->email }} <br>
    <b>Nama : </b>{{ Auth::user()->name }}
@endsection
