@extends('layouts.app')

@section('title', 'Laravel CMS | Log In')

@section('auth_content')
<body class="hold-transition login-page">

  <div class="row">
    <div class="img d-inline">
      <img src="{{asset('img')}}/login.svg" alt="">
  </div>

  <div class="login-box d-inline">
    @if ($errors->any())
    <div class="alert alert-danger">
      <div>
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
      </div>
    </div>
    @endif
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
        <div class="row mb-3">
          <div class="col-8">
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-dark-blue btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        {!!Form::close()!!}

         <p class="mb-1">
          <a href="/register" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
<!-- /.login-box -->
  </div>
@endsection

