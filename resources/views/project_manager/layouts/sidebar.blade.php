<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->guard('project_manager')->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(Request::segment(2) == '') active @endif">
                <a href="{{ route('project_manager.dashboard.index') }}">
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
                    <li class="@if(Request::segment(2) == 'users' && Request::segment(3) == '') active @endif"><a href="{{ route('project_manager.users.index') }}"><i class="fa fa-circle-o"></i> List </a></li>
                    <li class="@if(Request::segment(2) == 'users' && Request::segment(3) == 'create') active @endif"><a href="{{ route('project_manager.users.create') }}"><i class="fa fa-circle-o"></i> Create </a></li>
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
                    <li class="@if(Request::segment(2) == 'developers' && Request::segment(3) == '') active @endif"><a href="{{ route('project_manager.developers.index') }}"><i class="fa fa-circle-o"></i> List </a></li>
                    <li class="@if(Request::segment(2) == 'developers' && Request::segment(3) == 'create') active @endif"><a href="{{ route('project_manager.developers.create') }}"><i class="fa fa-circle-o"></i> Create </a></li>
                </ul>
            </li>
            <li class="@if(Request::segment(2) == 'chats') active @endif">
                <a href="{{ route('project_manager.chats.index') }}">
                    <i class="fa fa-comments"></i> <span>Chats</span>
                </a>
            </li>
        </ul>
    </section>
</aside>