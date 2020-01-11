@extends('layouts.min')

@section('title')
Register
@endsection

@section('content')
<div class="container d-flex flex-column">
	<div class="row h-100">
		<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
			<div class="d-table-cell align-middle">

				<div class="text-center mt-4">
					<h1 class="h2">{{ config('app.name', 'Laravel') }}</h1>
					<p class="lead">
						Start creating the best possible user experience for you customers.
					</p>
				</div>

				<div class="card">
					<div class="card-body">
						<div class="m-sm-4">
                        <form method="POST" action="{{ route('register') }}">
                        @csrf

								<div class="form-group">
									<label  for="name" >{{ __('Name') }}</label>
                                    <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>								
								<div class="form-group">
									<label for="email"> {{ __('E-Mail Address') }} </label>
                                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autocomplete="email"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<label for="password">Password</label>
                                    <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter password"  required autocomplete="new-password"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror     
                                </div>
                                <div class="form-group">
									<label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm"  class="form-control form-control-lg " type="password" name="password_confirmation"  required autocomplete="new-password"/>
                                    
								</div>
								<div class="text-center mt-3">									
									<button type="submit" class="btn btn-lg btn-primary">{{ __('Register') }}</button>
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