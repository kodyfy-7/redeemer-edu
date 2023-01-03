@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('sub-title')
    Login 
@endsection

@section('content')
<form action="{{ route('custom.login.submit') }}" method="post">
    @csrf
    @include('auth.form')
</form>
@endsection
                        

                        