@extends('layouts.authentication.master')

@section('title', 'Login')

@section('content')
<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
              
               <div class="login-main">
                  <form method="POST" action="{{ route('login') }}" class="theme-form">
                     @csrf
                     <h4>Log in to account</h4>
                     <p>Enter your email & password to login</p>
                     <div class="form-group">
                        <label class="col-form-label">Email Address</label>
                        <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="remember_me" type="checkbox" name="remember">
                           <label class="text-muted" for="remember_me">Remember password</label>
                        </div>
                        
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                     </div>
                     
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
