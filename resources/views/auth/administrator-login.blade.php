@extends('layouts.auth')

@section('title')
    Administrator Login
@endsection

@section('sub-title')
    Administrator Login 
@endsection

@section('content')
<form action="{{ route('administrator.login.submit') }}" method="post">
    @csrf
    @include('auth.form')
</form>
@endsection
                        

                        