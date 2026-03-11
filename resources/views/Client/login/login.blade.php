@extends('client.layout.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="link-title d-flex mx-5 pt-4 px-4">
            <a href="{{ route('client.home') }}" class="text-decoration-none text-dark link-success "><p>Trang chủ ></p></a>
            <a href="" class="text-decoration-none text-success fw-bold"><p class="ms-2" >Đăng nhập tài khoản </p></a>
        </div>
        <div class="auth-login mx-auto" style="max-width: 700px;">
            @if($errors->has('login_error'))
                <div class="alert alert-danger py-2 text-center">
                    {{ $errors->first('login_error') }}
                </div>
            @endif
            <form action="{{ route('client.login') }}" method="POST">
                @csrf

                <div class="title-form d-flex justify-content-center align-items-center">
                    <a href="{{ route('client.login') }}" class="text-decoration-none text-dark fs-4 fw-bold">Đăng nhập</a>
                    <p class="mx-5 fs-4">|</p>
                    <a href="{{ route('client.register') }}" class="text-decoration-none text-dark fs-4">Đăng kí</a>
                </div>
                <div class="form_input">
                    <div class="form-group text-start my-3">
                        <input type="text" name="email" class="input form-control bg-light" value="{{ old('email') }}"
                            placeholder="Email Address">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group text-start my-4">
                        <input type="password" name="password" class=" input form-control bg-light " placeholder="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form_helper d-flex ">
                    <div class="form-helper_remember">
                        <input type="checkbox">
                        <label for="">Remember me</label>
                    </div>
                    <div class="form-helper_forgot">
                        <a href="#" class="forgot">Forgot password!</a>
                    </div>
                </div>
                <div class="submit">
                    <button class="btn btn-secondary w-100 my-4">Sign In</button>
                </div>
                <div class="signup_link">
                    <p>Don't have an account? <a href="#" class="link">Create one</a></p>
                </div>
            </form>
        </div>
    </div>

@endsection