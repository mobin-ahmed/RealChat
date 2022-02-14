@extends('master')
@section('body')
<!-- <div class="container">
    <section class="form signup">
      <header class="text-center">RealChat</header>
      <form class="bg-danger" action="{{url('signup')}}" method="POST" enctype="multipart/form-data" >
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="first_name" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="last_name" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image"  required>
        </div>
        <div class="field button">
          <input type="submit" name="btn" value="Sign Up">
        </div>
      </form>
      <div class="link">Already signed up? <a href="{{url('/login-page')}}">Login now</a></div>
    </section>
  </div> -->

  <div class="container">
    <div class="row">
      <div class="col-sm-6 bg-danger">
        <h4 class="text-danger text-center">RealChat</h4>
        <form class="p-5" action="{{url('do-signup')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}  
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" placeholder="First name" required>
          </div>
          <div>
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" required>
          </div>
          <div>
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div>
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
          </div>
          <div>
            <label>Image</label>
            <input type="file" name="image" class="form-control" placeholder="Enter your picture" required>
          </div>
          <input type="submit" class="btn btn-success form-control" value="Sign Up">
        </form>
        <div>If already registered? <a href="{{url('/login-page')}}">Login now</a></div>
      </div>
    </div>
  </div>
@endsection