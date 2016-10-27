
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ trans('front/site.title')}} | Log in</title>
        <meta name="description" content="">    
        <meta name="format-detection" content="telephone=no">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" type="image/x-icon" href="{!! asset('img/logo.png') !!}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        @yield('head')

  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Bootstrap 3.3.6 -->
        {!! HTML::style('admin/bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
        {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
        {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}
  <!-- Theme style -->
        {!! HTML::style('admin/dist/css/AdminLTE.min.css') !!}
  <!-- iCheck -->
        {!! HTML::style('admin/plugins/iCheck/square/blue.css') !!}
    </head>
<body class="hold-transition login-page">
        @yield('main')          
      
        {!! HTML::script('admin/plugins/jQuery/jquery-2.2.3.min.js') !!}
        {!! HTML::script('admin/bootstrap/js/bootstrap.min.js') !!}
        {!! HTML::script('admin/plugins/iCheck/icheck.min.js') !!}
        <script>
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });  
                 $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                  });
            });
           
        </script>  
        @stack('scripts')
  </body>
</html>