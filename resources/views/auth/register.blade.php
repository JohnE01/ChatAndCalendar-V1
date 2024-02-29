@extends('layouts.authentication.master')

@section('title', 'Register')

@section('content')
<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo" href="{{ route('index') }}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/login.png')}}" alt="loginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="loginpage"></a></div>
               <div class="login-main">
                  <form method="POST" action="{{ route('register') }}" class="theme-form">
                     @csrf
                     <h4>Create an Account</h4>
                     <p>Please fill out the following information to register</p>
                     <div class="form-group">
                        <label class="col-form-label">Name</label>
                        <input class="form-control" type="text" name="name" required="" placeholder="John Doe">
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email" name="email" required="" placeholder="test@example.com">
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Confirm Password</label>
                        <input class="form-control" type="password" name="password_confirmation" required="" placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                     </div>
                     <div class="form-group mb-0">
                        <button class="btn btn-primary btn-block" type="submit">Register</button>
                     </div>
                     <h6 class="text-muted mt-4 or">Or Register with</h6>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
