<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->guard('admin')->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(Request::segment(2) == '') active @endif">
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="@if(Request::segment(2) == 'users') active @endif treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(2) == 'users' && Request::segment(3) == '') active @endif"><a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i> List </a></li>
                    <li class="@if(Request::segment(2) == 'users' && Request::segment(3) == 'create') active @endif"><a href="{{ route('admin.users.create') }}"><i class="fa fa-circle-o"></i> Create </a></li>
                </ul>
            </li>
            <li class="@if(Request::segment(2) == 'quotes') active @endif treeview">
                <a href="#">
                    <i class="fa fa-handshake-o"></i> <span>Quote</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(2) == 'quotes' && Request::segment(3) == '') active @endif"><a href="{{ route('admin.quotes.index') }}"><i class="fa fa-circle-o"></i> List </a></li>
                </ul>
            </li>
            <li class="@if(Request::segment(2) == 'skills') active @endif treeview">
                <a href="#">
                    <i class="fa fa-superpowers"></i> <span>Skill</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(2) == 'skills' && Request::segment(3) == '') active @endif"><a href="{{ route('admin.skills.index') }}"><i class="fa fa-circle-o"></i> List </a></li>
                    <li class="@if(Request::segment(2) == 'skills' && Request::segment(3) == 'create') active @endif"><a href="{{ route('admin.skills.create') }}"><i class="fa fa-circle-o"></i> Create </a></li>
                </ul>
            </li>
            <li class="@if(Request::segment(2) == 'developers') active @endif treeview">
                <a href="#">
                    <i class="fa fa-superpowers"></i> <span>Developer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(Request::segment(2) == 'developers' && Request::segment(3) == '') active @endif"><a href="{{ route('admin.developers.index') }}"><i class="fa fa-circle-o"></i> List </a></li>
                    <li class="@if(Request::segment(2) == 'developers' && Request::segment(3) == 'create') active @endif"><a href="{{ route('admin.developers.create') }}"><i class="fa fa-circle-o"></i> Create </a></li>
                </ul>
            </li>
            <li class="@if(Request::segment(2) == 'chats') active @endif">
                <a href="{{ route('admin.chats.index') }}">
                    <i class="fa fa-comments"></i> <span>Chats</span>
                </a>
            </li>
        </ul>
    </section>
</aside>