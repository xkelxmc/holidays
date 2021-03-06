<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->
      <a href="{{ url('') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! config('backpack.base.logo_mini') !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! config('backpack.base.logo_lg') !!}</span>
      </a>

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>


<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->

    <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
      @if (Auth::guest())
        <li><a href="{{ route('profile.auth.login') }}">{{ trans('profile.login') }}</a></li>
        @if (config('backpack.base.registration_open'))
          <li><a href="{{ route('profile.auth.register') }}">{{ trans('profile.register') }}</a></li>
        @endif
      @else
        <li><a href="{{ route('profile.auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('profile.logout') }}</a></li>
    @endif
    <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
