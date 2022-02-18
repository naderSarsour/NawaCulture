  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('website.home')}}">
    
        <div class="sidebar-brand-text mx-3">Nawa Culture </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews"
            aria-expanded="true" aria-controls="collapseNews">
            <i class="fas fa-fw fa-comment"></i>
            <span>News</span>
        </a>
        <div id="collapseNews" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.news.index')}}">All News</a>
                <a class="collapse-item" href="{{ route('admin.news.create')}}">Add News</a>
            </div>
        </div>
        </li>
        <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjct"
            aria-expanded="true" aria-controls="collapseProjct">
            <i class="fas fa-fw fa-comment"></i>
            <span>Projcts</span>
        </a>
        <div id="collapseProjct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.projects.index')}}">All Projects</a>
                <a class="collapse-item" href="{{ route('admin.projects.create')}}">Add Projects</a>
                <a class="collapse-item" href="{{ route('admin.project.donation')}}">Add Donations</a>

            </div>
        </div>
        </li>
                @if(Auth::user()->type == 'super-admin')
                 <!-- Divider -->
                 <hr class="sidebar-divider">
                 <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents"
                        aria-expanded="true" aria-controls="collapseEvents">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>ُEvents</span>
                    </a>
                    <div id="collapseEvents" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('admin.events.index')}}">All Events</a>
                            <a class="collapse-item" href="{{ route('admin.events.create')}}">Add Events</a>
                            <a class="collapse-item" href="{{ route('admin.all-events.enrollments')}}">Events Enrollments</a>
                        </div>
                    </div>
                </li>
                @endif
                
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->