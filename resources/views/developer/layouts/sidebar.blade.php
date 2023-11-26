<div class="sidebar" id="sidebar">
    <div class="border-bottom mb-4 p-3">
        <img src="{{ asset('frontend/images/employee-Logo.png') }}" alt="employee Logo" width="81" height="81" class="img-fluid">
    </div>
    <ul class="list-unstyled mb-0 sidebar-menu">
        <li class="{{ Request::route()->getName() == 'developer.dashboard.index' ? 'active' : '' }}">
            <a href="{{ route('developer.dashboard.index') }}">
                <i class="custom icon-emp-dashboard fa-lg"></i><span> Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="custom icon-emp-user fa-lg"></i><span> Employee</span>
            </a>
        </li>
        <li>
            <a href="#" class="" data-bs-toggle="collapse" data-bs-target="#Task" aria-expanded="false"> <i class="custom icon-emp-watch fa-lg"></i><span> Task Management</span></a>
            <ul id="Task" class="list-unstyled collapse" data-parent=".sidebar-menu">
                <li><a href="#"><span>Active Project</span></a></li>
                <li><a href="#"><span>Active Tickets</span></a></li>
                <li><a href="#"><span>Total Projects</span></a></li>
                <li><a href="#"><span>Total Ticket</span></a></li>
            </ul>
        </li>
        <li class="{{ Request::route()->getName() == 'developer.chat' ? 'active' : '' }}">
            <a href="{{ route('developer.chat') }}">
                <i class="custom icon-emp-file fa-lg"></i><span> Chat Board </span>
            </a>
        </li>
        <li class="{{ Request::route()->getName() == 'developer.dashboard.show' ? 'active' : '' }}">
            <a href="{{ route('developer.dashboard.show', auth()->guard('developer')->user()->id) }}">
                <i class="custom icon-emp-person fa-lg"></i> <span> Profile</span>
            </a>
        </li>
    </ul>
</div>