@extends('master')
@section('body')
<div class="wrapper">
    <section class="form login">
      <header class="text-center">RealChat</header>
      <form class="bg-danger" action="{{url('do-login')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
      {{csrf_field()}}
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="btn" value="Login">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="{{url('signup-page')}}">Signup now</a></div>
    </section>
  </div>
@endsection