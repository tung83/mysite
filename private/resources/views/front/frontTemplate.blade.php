<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ trans('front/site.title') }}</title>
        <meta name="description" content="">    
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{!! asset('img/logo.png') !!}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=latin-ext" rel="stylesheet">

        @yield('head')

        {!! HTML::style('css/front.css') !!}
        {!! HTML::style('css/front_style.css') !!}
    </head>
  <body>
    <div class="{{ !empty($currentMenu)?$currentMenu->e_view:'home'}}-page container">
        <header class="row">
              
            <!--http://bootsnipp.com/snippets/featured/expanding-search-button-in-css-->
            
            <div id="header-top" class="row pull-right clearfix">                
                <div class="pull-right">
                    <ul>
                        <li>
                             {!! (session('locale') == 'vi') ? link_to('/', 'VI', array('class' => 'active')) : link_to('language/vi', 'VI') !!}
                         </li>
                         <li>
                             <span>|</span>
                         </li>
                         <li>                  
                             {!! (session('locale') == 'vi') ? link_to('language/en', 'ENG') : link_to('#', 'ENG', array('class' => 'active')) !!}
                         </li>
                    </ul>
                </div>         
                <div id="search-top">
                    <form action="" class="search-form">
                        <div class="form-group has-feedback">
                                <label for="search" class="sr-only">Search</label>
                                <input type="text" class="form-control" name="search" id="search" placeholder="search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                    </form>
                </div>       
            </div>             

            <div id="flags" class="text-center"></div>
            <div id="header-bottom">
                <div id="logo">
                    <a href="{{ route('home') }}"/>
                </div>  
                <div id="header-right-bottom" class="pull-right">
                    <span><i class="fa fa-phone"></i> 0123.456.789</span>
                    <span><i class="fa fa-commenting-o"></i>&nbsp;CHAT ONLINE</span> 
                </div>
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html">{{ trans('front/site.title') }}</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            @foreach( $menus as $menu )
                                <li class="{{ $menu->e_view == (!empty($currentMenu)?$currentMenu->e_view:'home') ? 'active' : ''}}">                            
                                    {!! link_to(languageTransform($menu, 'view'), languageTransform($menu, 'title')) !!}                            
                                </li>
                            @endforeach                    
                        </ul>
                    </div>
                </nav>
            </div>
            @yield('header')    
        </header>

        <main>
            @if(session()->has('ok'))
                @include('partials/error', ['type' => 'success', 'message' => session('ok')])
            @endif  
            @if(isset($info))
                @include('partials/error', ['type' => 'info', 'message' => $info])
            @endif
            @yield('main')
        </main>

    </div>
        <footer class="container">            
            @include('front.footer', compact('serviceMenu', 'serviceCategories', 'qtextFooterContact'
            , 'qtextIntroduction'
            , 'basicConfigs'))               
        </footer>

        {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js') !!}
        {!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}
    <script>
     $(function() {
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
     });
    </script>
    @stack('scripts')    
    
  </body>
</html>