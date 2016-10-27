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
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                      <input type="checkbox"> Remember Me</input>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                {!! Form::submit('Sign In', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
              </div>
              <!-- /.col -->
            </div> 
					
            {!! link_to('password/reset', trans('front/login.forget')) !!}
          

    {!! Form::close() !!}    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

