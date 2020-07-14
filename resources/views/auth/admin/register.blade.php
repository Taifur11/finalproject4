<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    






    <!-- Required meta tags -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('assets/frontend') }}/img/favicon.png" type="image/png">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/form.css">


  <!-- toaster css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body style="background-color: #86a9a9;">
<div class="container">
<div class="main">
  <h1 class="fromh1">{{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</h1>

                        @isset($url)
                        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}" class="formdesign" enctype="multipart/form-data">
                        @else
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" class="formdesign" enctype="multipart/form-data">
                        @endisset
                         @csrf

<label for="name" class="formlebel">{{ __('Name') }}</label>
    <input id="name" type="text" class="forminput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Your Name">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror





<label for="email" class="formlebel">{{ __('E-Mail Address') }}</label>
    <input id="email" type="email" class="forminput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror




<label for="password" class="formlebel">{{ __('Password') }}</label>
    <input id="password" type="password" class="forminput @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Enter Your password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

<label for="password-confirm" class="formlebel">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" type="password" class="forminput"  name="password_confirmation"  required autocomplete="new-password"placeholder="Enter Your password Again">




<label for="image" class="formlebel">{{ __('Give A image') }}</label>
    <input id="image" type="file" class="forminput @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus placeholder="Enter Your image">
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror




<label for="phone_no" class="formlebel">{{ __('Give Phnone Number') }}</label>
    <input id="phone_no" type="text" class="forminput @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no') }}" required autocomplete="phone_no" autofocus placeholder="Enter Your phone_no">
    @error('phone_no')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror



                        
     <button type="submit" class="formbutton">
                                    {{ __('Register') }}
    </button>
                        
                    </form>
                </div>
            
        
 </div>   

    <script src="{{ asset('assets/frontend') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/popper.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    {!! Toastr::message() !!}
    <script>
    @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
    </script>

</body>
</html>
