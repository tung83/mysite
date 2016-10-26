@extends('admin.auth.template')

@section('main')
<div class="login-box">
  <div class="login-logo">
    <b>{{ trans('front/site.title')}}</b>Admin
  </div>
    @if(session()->has('error'))
        @include('partials/error', ['type' => 'danger', 'message' => session('error')])
    @endif	
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h2 class="intro-text text-center">{{ trans('front/login.connection') }}</h2>
    
    {!! Form::open(['url' => 'admin@@/login']) !!}	
            {!! Form::controlBootstrap('email', 0, 'log', $errors, null, null, null, 'Email', 'glyphicon glyphicon-envelope') !!}
            {!! Form::controlBootstrap('password', 0, 'password', $errors, null, null, null, 'Password', 'glyphicon glyphicon-lock') !!}
            {!! Form::submitBootstrap(trans('front/form.send'), 'col-lg-12') !!}
            {!! Form::checkboxBootstrap('memory', trans('front/login.remind')) !!}
            {!! Form::text('address', '', ['class' => 'hpet']) !!}		  
					
            {!! link_to('password/reset', trans('front/login.forget')) !!}
          

    {!! Form::close() !!}
    
<!--    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
         /.col 
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
         /.col 
      </div>
    </form>-->


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

