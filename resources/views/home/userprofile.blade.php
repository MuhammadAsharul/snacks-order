@extends('home.layouts.profile')
@section('title', 'User Profile')
@section('profilecontent')
    {{ Auth::user()->email }} <br>
    {{ Auth::user()->name }}
@endsection
