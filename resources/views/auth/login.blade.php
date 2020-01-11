@extends('layouts.min')

@section('title')
Login
@endsection

@section('content')
<div class="container d-flex flex-column">
	<div class="row h-100">
		<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
			<div class="d-table-cell align-middle">

				<div class="text-center mt-4">
					<h1 class="h2">{{ config('app.name', 'Laravel') }}</h1>
					<p class="lead">
						Sign in to your account to continue
					</p>
				</div>

				<div class="card">
					<div class="card-body">
						<div class="m-sm-4">
							<form method="POST" action="{{ route('login') }}">
								@csrf

								<div class="form-group">
									<label>{{ __('E-Mail Address') }}</label>
									<input class="form-control @error('email') is-invalid @enderror form-control-lg" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email" autofocus />
									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

								</div>
								<div class="form-group">
									<label>{{ __('Password') }}</label>
									<input class="form-control @error('password') is-invalid @enderror form-control-lg" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password" />

									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

									@if (Route::has('password.request'))
									<small>
										<a href="{{ route('password.request') }}">
											{{ __('Forgot Your Password?') }}
										</a>
									</small>
									@endif

								</div>
								<div>
									<div class="custom-control custom-checkbox align-items-center">
										<input type="checkbox" class="custom-control-input" value="remember-me" name="remember-me" checked>
										<label class="custom-control-label text-small">Remember me next time</label>
									</div>
								</div>
								<div class="text-center mt-3">
									<button type="submit" class="btn btn-lg btn-primary">{{ __('Login') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection