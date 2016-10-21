<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
  <li class="header">@lang('admin.MAIN_MENU')</li>
  <li class="{{ Util::activeIfRouteTagged('home') }}">
    <a href="{{ URL::route('home') }}"><i class="glyphicon glyphicon-home"></i> Home</a>
  </li>
  
  <li class="{{ Util::activeIfRouteTagged('product') }}">
    <a href="{{ URL::route('home') }}"><i class="glyphicon glyphicon-th"></i> @lang('product.title')</a>
  </li>
  
  <li class="{{ Util::activeIfRouteTagged('menu') }}">
    <a href="{{ URL::route('home') }}"><i class="glyphicon glyphicon-menu-hamburger"></i> @lang('menu.title')</a>
  </li>
  
  <li class="header">@lang('admin.ADMIN')</li>
  <li class="{{ Util::activeIfRouteTagged('users') }}">
    <a href="{{ URL::route('users') }}"><i class="glyphicon glyphicon-user"></i> @lang('admin.USER_MANAGEMENT')</a>
  </li>
  
</ul>
