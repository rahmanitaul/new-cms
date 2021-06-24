@extends('layouts.app')

@section('title', 'Laravel CMS | Log In')

@section('auth_content')
<body class="hold-transition login-page">

  <div class="row">
    <div class="img d-inline">
      <img src="{{asset('img')}}/login.svg" alt="">
    </div>

    <div class="register-box d-inline">

      @if ($errors->any())
      <div class="alert alert-danger">
        <div>
          @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
          @endforeach
        </div>
      </div>
      @endif

      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="/" class="h2"><b>Laravel</b> CMS</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Register a new membership</p>

          <form action="../../index.html" method="post">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Full name">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Retype password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
             </div>
             <!-- /.col -->
             <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <a href="/" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <div class="login-box d-inline">

    <!-- /.login-logo -->
    <div class="card  outline-dark-blue">
      <div class="card-header text-center">
        <a href="/" class="h2"><b>Laravel</b> CMS</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
        @csrf 

        <div class="input-group mb-3">

          {{Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail Address','autocomplete' => 'current-email', 'required'])}}

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>
              {{$message}}
            </strong>
          </span>
          @enderror
        </div>
        <div class="input-group mb-3">

          {{Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password', 'autocomplete' => 'current-password', 'required'])}}

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>
              {{$message}}
            </strong>
          </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-4">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-red btn-block">Register</button>
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark-blue btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        {!!Form::close()!!}

        <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-1">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
</div>
@endsection

