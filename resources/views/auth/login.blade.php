<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/register.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
	<title>Login</title>
</head>
  <body>
    <div class="main">
		<div class="container b-container" id="b-container">
			<form action="{{ route('login') }}" class="form" id="b-form" method="post">
				@csrf
				<h2 class="form_title title">Sign in to Website</h2>
				<input class="form__input" type="text" name="email" placeholder="Email Address"> 
				@error('email')
					<span class="text-danger" >{{ $message }}</span>
				@enderror

				<input class="form__input" type="password" name="password" placeholder="Password">
				@error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

				<a href="#" style="text-decoration: none" class="form__link">Forgot your password?</a>
				<button class="form__button button submit" type="submit" style="cursor: pointer">SIGN IN</button>
			</form>
		</div>
	
		<div class="switch" id="switch-cnt">
			<div class="switch__circle"></div>
			<div class="switch__circle switch__circle--t"></div>
			<div class="switch__container" id="switch-c1">
			  <h2 class="switch__title title">Hello Friend !</h2>
			  <p class="switch__description description">Enter your personal details and start journey with us</p>
			  <a href="{{ route('register') }}" style="text-decoration: none;color:#f9f9f9"><button class="switch__button button switch-btn">SIGN UP</button></a>
			</div>
		  </div>
      </div>
  </body>
</html>