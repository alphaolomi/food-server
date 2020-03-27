@extends('layouts.min')

@section('content')
<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    {{-- <div class="logo"></div> --}}
                    {{ config('app.name', 'Laravel') }}
                </h1>
            </header>
            <div class="auth-content">
                <p class="text-center">Register</p>
                <form id="signup-form" action="/index.html" method="GET" novalidate="">
                    <div class="form-group">
                        <label for="firstname">Name</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control underlined" name="firstname" id="firstname"
                                    placeholder="Enter firstname" required="">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control underlined" name="lastname" id="lastname"
                                    placeholder="Enter lastname" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control underlined" name="email" id="email"
                            placeholder="Enter email address" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="password" class="form-control underlined" name="password" id="password"
                                    placeholder="Enter password" required="">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control underlined" name="retype_password"
                                    id="retype_password" placeholder="Re-type password" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agree">
                            <input class="checkbox" name="agree" id="agree" type="checkbox" required="">
                            <span>Agree the terms and <a href="#">policy</a></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
                    </div>
                    <div class="form-group">
                    <p class="text-muted text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
