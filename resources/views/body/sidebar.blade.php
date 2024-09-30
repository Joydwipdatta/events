<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->

        @if (Auth::check())
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">


                    <li>
                        <a href="/admin/dashboard" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/events-bookings" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Event Bookings</span>
                        </a>
                    </li>

                    <li>
                        <a href=" /add-advertisement" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>Add Advertisement</span>
                        </a>
                    </li>

                </ul>
            </div>
        @endif
        <!-- Sidebar -->
    </div>
</div>
