<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/register.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <title>register</title>
</head>
  <body>
    <div class="main">
      <div class="container a-container" id="a-container">
        <form action="{{ route('register') }}" class="form" id="a-form" method="post">
            @csrf
          <h2 class="form_title title">Create Account</h2>
           <input class="form__input" type="text" name="name" placeholder="Full Name">
          @error('name')
					  <span class="text-danger" >{{ $message }}</span>
				  @enderror

          <input class="form__input" type="text" name="email" placeholder="Email Address">
          @error('email')
					  <span class="text-danger" >{{ $message }}</span>
				  @enderror

          <input class="form__input" type="text" name="phone_number" placeholder="Phone Number">
          @error('phone_number')
					  <span class="text-danger" >{{ $message }}</span>
				  @enderror

          <input class="form__input" type="password" name="password" placeholder="Password">
          @error('password')
					  <span class="text-danger" >{{ $message }}</span>
				  @enderror

          <input class="form__input" type="password" name="password_confirmation" placeholder="Confirm Password">
          <button class="form__button button submit" type="submit" style="cursor: pointer">SIGN UP</button>
        </form>
      </div>
	  
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Welcome Back !</h2>
          <p class="switch__description description">To keep connected with us please login with your personal info</p>
          <a href="{{ route('login') }}" style="text-decoration: none;color:#f9f9f9"><button class="switch__button button switch-btn">SIGN IN</button></a>
        </div>
      </div>
    </div>
  </body>
</html>