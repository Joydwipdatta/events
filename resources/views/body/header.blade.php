<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <h4 class="text-center mt-4 font-weight-bold " style="color: #fff;"> Events Portal</h4>

            </div>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            {{-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form> --}}

        </div>

        <div class="d-flex">


            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                @auth
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="/admin/edit/profile"><i class="ri-user-line align-middle me-1"></i>
                            Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/logout"><i
                                class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                    </div>
                </div>
            @endauth

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="ri-settings-2-line"></i>
                </button>
            </div> --}}

        </div>
    </div>
</header>
