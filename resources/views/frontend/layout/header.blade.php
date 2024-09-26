@if (url()->current() === url('/'))
    <header class="conSection transparentHeader">
    @else
        <header class="conSection">
@endif
<div class="container">
    <div class="topbar">
        <a href="/">
            <div class="logo">
                <i class="fa-solid fa-spray-can"></i>
                <h1>Tripura Events</h1>
            </div>
        </a>
        <!-- Before Login  -->


        <div class="navbar">
            @if (Auth::check())
                @php
                    $roleType = Auth::user()->role_type;
                @endphp

                @if ($roleType === 'user')
                    @if (url()->current() === url('/'))
                        <button class="mobileHide"><a href="{{ route('user.dashboard') }}"><i
                                    class="fa-solid fa-plus"></i>Dashboard</a></button>
                    @else
                        <div class="navbar">
                            <div class="profileMenuCon">
                                <span class="profileMenu"><i class="fa-regular fa-user"></i>{{ Auth::user()->name }}<i
                                        class="fa-solid fa-angle-down"></i></span>
                                <div class="profileMenu-content">
                                    <a href="/create-event">Create Event</a>
                                    <a href="/user-dashboard">Manage Events</a>
                                    <a href="#">Account Settings</a>
                                    <a href="{{ route('admin.logout') }}">Logout</a>
                                </div>
                            </div>

                        </div>
                    @endif
                    {{-- <a href="" class="btn btn-primary">Profile</a> --}}
                @elseif ($roleType === 'admin')
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ url('/') }}" class="btn btn-primary">Home</a>
                @endif
            @else
                <a href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                <a href="/register" class="mobileHide"><i class="fa-regular fa-user"></i>Register</a>
                <button class="mobileHide"><a href="create-event.html"><i class="fa-solid fa-plus"></i>Create
                        Event</a></button>

            @endif
        </div>


        {{-- <button class="mobileHide"><a href="create-event.html"><i class="fa-solid fa-plus"></i>Create
                    Event</a></button> --}}
    </div>


    <!-- After Login  -->

</div>
</div>
</header>
