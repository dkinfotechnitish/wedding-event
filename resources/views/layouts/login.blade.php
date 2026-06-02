@extends('layouts.app')

@section('content')
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">


        <div class="background-shape"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <img class="big-logo" src="assets/img/core-img/logo-white.png" alt="">

                    <div class="register-form mt-5">
                        <form action={{ route('login') }} method="POST">
                            <div class="form-group text-start mb-4"><span>Username</span>
                                <label for="username"><i class="ti ti-user"></i></label>
                                <input type="email" class="form-control" name="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group text-start mb-4"><span>Password</span>
                                <label for="password"><i class="ti ti-key"></i></label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Enter your password">
                            </div>
                            <button class="btn btn-warning btn-lg w-100" type="submit">Log In<i
                                    class="ti ti-arrow-right"></i></button>
                        </form>

                    </div>

                    <div class="view-as-guest mt-3"><a class="btn btn-primary btn-sm" href="{{ route('index') }}">View as
                            guest<i class="ti ti-arrow-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
