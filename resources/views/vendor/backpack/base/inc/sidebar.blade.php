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
            <small><a href="{{ route('backpack.account.info') }}"><span><i
                      class="fa fa-user-circle-o"></i> {{ trans('backpack::base.my_account') }}</span></a> &nbsp; &nbsp;
              <a href="{{ backpack_url('logout') }}"><i class="fa fa-sign-out"></i>
                <span>{{ trans('backpack::base.logout') }}</span></a></small>
          </small>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
      {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
      <!-- ================================================ -->
        <!-- ==== Recommended place for admin menu items ==== -->
        <!-- ================================================ -->
        <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i>
            <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

        <li><a href="{{ backpack_url('category') }}"><i class="fa fa-list"></i> <span>{{ trans('categories.categories') }}</span></a></li>

        <li><a href="{{ backpack_url('obyav') }}"><i class="fa fa-newspaper-o"></i> <span>Объявления</span></a></li>

        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/page') }}"><i class="fa fa-file-o"></i>
            <span>{{ trans('main.pages') }}</span></a></li>

        <!-- Users, Roles Permissions -->
        <li class="treeview">
          <a href="#"><i class="fa fa-group"></i> <span>{{trans('main.user_role_perm')}}</span> <i
                class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-user"></i>
                <span>{{ trans('main.users') }}</span></a></li>
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i>
                <span>{{ trans('main.roles') }}</span></a></li>
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i
                    class="fa fa-key"></i> <span>{{ trans('main.permissions') }}</span></a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#"><i class="fa fa-cogs"></i> <span>{{ trans('main.advanced') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i
                    class="fa fa-files-o"></i> <span>{{ trans('main.file_manager') }}</span></a></li>
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}"><i class="fa fa-hdd-o"></i>
                <span>{{ trans('main.backups') }}</span></a></li>
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/setting') }}"><i class="fa fa-cog"></i>
                <span>{{ trans('main.settings') }}</span></a></li>
          </ul>
        </li>
        <!-- ======================================= -->
        {{-- <li class="header">Other menus</li> --}}
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endif
