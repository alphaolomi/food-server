@extends('layouts.min')

@section('content')
<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    {{ config('app.name', 'Laravel') }}
                </h1>
            </header>
            <div class="auth-content">
                <p class="text-center">LOGIN TO CONTINUE</p>
                <form id="login-form" action="/index.html" method="GET" novalidate="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="email" class="form-control underlined" name="username" id="username"
                            placeholder="Your email address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control underlined" name="password" id="password"
                            placeholder="Your password" required>
                    </div>
                    <div class="form-group">
                        <label for="remember">
                            <input class="checkbox" id="remember" type="checkbox">
                            <span>Remember me</span>
                        </label>
                        <a href="reset.html" class="forgot-btn pull-right">Forgot password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                    </div>
                    <div class="form-group">
                        <p class="text-muted text-center">Do not have an account? <a href="signup.html">Sign Up</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        {{-- <div class="text-center">
            <a href="index.html" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left"></i> Back to dashboard </a>
        </div> --}}
    </div>
</div>
@endsection
