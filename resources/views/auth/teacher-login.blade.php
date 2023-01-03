@extends('layouts.auth')

@section('title')
    Teacher Login
@endsection

@section('sub-title')
    Teacher Login 
@endsection

@section('content')
<form action="{{ route('teacher.login.submit') }}" method="post">
    @csrf
    @include('auth.form')
</form>
@endsection