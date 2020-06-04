@extends('layouts.guest_sign')
@section('content')
    <div class="guest-left-panel-wrapper h-full inline-block">
        <div class="login-form-border">
            <div class="flex jccenter fs12 mt-3">
                <img src="{{asset('public/images/logo.png')}}" style="width:150px" class="w-56" />
            </div>
            <register-form/>
        </div>
        <footer class="mt-3 fs12">
            <p class="text-center text-gray-600">
                &copy;2020 All Rights Reserved Bulong® <br />
                <a href="" class="text-teal-600">Privacy</a> and <a href="" class="text-teal-600">Terms</a>
            </p>
        </footer>
    </div>
@endsection
