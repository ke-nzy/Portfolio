<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('login-assets/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('login-assets/images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Admin Login</h2>
				</div>
			</div>
            
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
				
				@if (session('status'))
					<p class="text-white">{{ session('status') }}</p>
				@endif

		      	<form method="POST" action="{{ route('login') }}" class="signin-form">
                    @csrf
		      		<div class="form-group">
		      			<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>

                        @if ($errors->has('email'))
                            <code><p class="text-white">{{$errors->first('email')}}</p></code>
                        @endif

                    </div>

	            <div class="form-group">
	              <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
	              <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                  @if ($errors->has('password'))
                      <code><p class="text-white">{{ $errors->first('password') }}</p></code>
                  @endif

	            </div>

	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>

	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label for="remember-me" class="checkbox-wrap checkbox-primary">Remember Me
							<input id="remember-me" type="checkbox" name="remember" checked>
							<span class="checkmark"></span>
						</label>
					</div>

					<div class="w-50 text-md-right">
						<a href="{{ route('password.request') }}" style="color: #fff">Forgot Password</a>
					</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With (Demo) &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-3 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-3 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('login-assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('login-assets/js/popper.js')}}"></script>
    <script src="{{asset('login-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login-assets/js/main.js')}}"></script>

	</body>
</html>




