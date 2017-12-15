@if (Auth::check())
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ backpack_avatar_url(Auth::user()) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <small>
            <small><a href="{{ route('profile.account.info') }}"><span><i
                      class="fa fa-user-circle-o"></i> {{ trans('profile.my_account') }}</span></a> &nbsp; &nbsp;
              <a href="{{ url('profile/logout') }}"><i class="fa fa-sign-out"></i>
                <span>{{ trans('profile.logout') }}</span></a></small>
          </small>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
       <li class="header">Профиль</li>
      <!-- ================================================ -->
        <!-- ==== Recommended place for admin menu items ==== -->
        <!-- ================================================ -->
        <li><a href="{{ url('profile/obyav') }}"><i class="fa fa-newspaper-o"></i> <span>Объявления</span></a></li>

        <!-- ======================================= -->
        {{-- <li class="header">Other menus</li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endif
