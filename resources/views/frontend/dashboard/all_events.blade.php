@extends('frontend.index_master')
@section('frontend')
    <section class="basicPage">
        <div class="conSection eventTabsSection">
            <div class="container">
                <div class="sectionTitle">
                    <h3 class="">All Events</h3>
                    <div class="line"></div>
                    <p class="">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod</p>
                </div>
                <div class="eventTab">
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'All')" id="defaultOpen">All</button>
                        <button class="tablinks" onclick="openCity(event, 'Week')">This Week</button>
                        <button class="tablinks" onclick="openCity(event, 'Online')">Online</button>
                        <button class="tablinks" onclick="openCity(event, 'Offline')">Offline</button>
                        <button class="tablinks" onclick="openCity(event, 'Free')">Free</button>
                        <button class="tablinks" onclick="openCity(event, 'Paid')">Paid</button>
                    </div>


                    @php
                        $allEvents = getAllEvents();
                        $EventsWeek = getWeekEvents();
                        $onlineEvent = getOnlineEvents();
                        $offlineEvents = getOfflineEvents();
                        $freeEvents = getFreeEvents();
                        $paidEvent = getPaidEvents();

                        // Fetch events where 'created_at' is between today and one week from now

                    @endphp

                    <div id="All" class="tabcontent">
                        @if ($allEvents->isEmpty())
                            <div class="emptyCategory">
                                <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                                <h4>No events in this Category</h4>
                                <p>Try a different Category</p>
                            </div>
                        @else
                            <div class="eventGrid">
                                @foreach ($allEvents as $allEvent)
                                    <a href="footbal_event_details.html">
                                        <div class="eventBox">
                                            <img src="{{ Storage::url($allEvent->event_thumbnail_image) }}" alt="">
                                            <div class="eventBoxCon">
                                                <span class="pill">{{ getUserName($allEvent->user_id) }}</span>
                                                <h2>{{ $allEvent->event_title }}</h2>
                                                @if ($allEvent->event_location == 'Venue')
                                                    <h6>{{ $allEvent->event_venue }}</h6>
                                                    <h6>{{ $allEvent->event_venue_name }}</h6>
                                                    <h6>{{ $allEvent->event_date }} ,{{ $allEvent->event_start_time }}
                                                        -{{ $allEvent->event_end_time }}</h6>
                                                @elseif ($allEvent->event_location == 'Online Event')
                                                    <h6>
                                                        Online Url: {{ $allEvent->event_online_link }}
                                                    </h6>
                                                @else
                                                    Venue Not Updated
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div id="Week" class="tabcontent">

                        @if ($EventsWeek->isEmpty())
                            <div class="emptyCategory">
                                <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                                <h4>No events in this Category</h4>
                                <p>Try a different Category</p>
                            </div>
                        @else
                            <div class="eventGrid">
                                @foreach ($EventsWeek as $weekEvent)
                                    <a href="footbal_event_details.html">
                                        <div class="eventBox">
                                            <img src="{{ Storage::url($weekEvent->event_thumbnail_image) }}"
                                                alt="">
                                            <div class="eventBoxCon">
                                                <span class="pill">{{ getUserName($weekEvent->user_id) }}</span>
                                                <h2>{{ $weekEvent->event_title }}</h2>
                                                @if ($weekEvent->event_location == 'Venue')
                                                    <h6>{{ $allEvent->venue_name }}</h6>
                                                    <h6>{{ $allEvent->event_date }}</h6>
                                                @elseif ($weekEvent->event_location == 'Online Event')
                                                    <h6>
                                                        Online Url: {{ $weekEvent->event_online_link }}
                                                    </h6>
                                                @else
                                                    Venue Not Updated
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif

                    </div>

                    <div id="Online" class="tabcontent">
                        @if ($onlineEvent->isEmpty())
                            <div class="emptyCategory">
                                <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                                <h4>No events in this Category</h4>
                                <p>Try a different Category</p>
                            </div>
                        @else
                            <div class="eventGrid">
                                @foreach ($onlineEvent as $online)
                                    <a href="footbal_event_details.html">
                                        <div class="eventBox">
                                            <img src="{{ Storage::url($online->event_thumbnail_image) }}" alt="">
                                            <div class="eventBoxCon">
                                                <span class="pill">{{ getUserName($online->user_id) }}</span>
                                                <h2>{{ $online->event_title }}</h2>
                                                {{-- @if ($online->event_location == 'Venue')
                                            <h6>{{ $allEvent->venue_name }}</h6>
                                            <h6>{{ $allEvent->event_date }}</h6> --}}
                                                @if ($online->event_location == 'Online Event')
                                                    <h6>
                                                        Online Url: {{ $online->event_online_link }}
                                                    </h6>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div id="Offline" class="tabcontent">
                        @if ($offlineEvents->isEmpty())
                            <div class="emptyCategory">
                                <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                                <h4>No events in this Category</h4>
                                <p>Try a different Category</p>
                            </div>
                        @else
                            <div class="eventGrid">
                                @foreach ($offlineEvents as $offline)
                                    <a href="footbal_event_details.html">
                                        <div class="eventBox">
                                            <img src="{{ Storage::url($offline->event_thumbnail_image) }}" alt="">
                                            <div class="eventBoxCon">
                                                <span class="pill">{{ getUserName($offline->user_id) }}</span>
                                                <h2>{{ $offline->event_title }}</h2>
                                                @if ($offline->event_location == 'Venue')
                                                    <h6>{{ $offline->event_venue }}</h6>
                                                    <h6>{{ $offline->event_venue_name }}</h6>
                                                    <h6>{{ $offline->event_date }} ,{{ $offline->event_start_time }}
                                                        -{{ $offline->event_end_time }}</h6>
                                                    {{-- @if ($offline->event_location == 'Online Event')
                                            <h6>
                                                Online Url: {{ $offline->event_online_link }}
                                            </h6> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div id="Free" class="tabcontent">
                        @if ($freeEvents->isEmpty())
                            <div class="emptyCategory">
                                <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                                <h4>No events in this Category</h4>
                                <p>Try a different Category</p>
                            </div>
                        @else
                            <div class="eventGrid">
                                @foreach ($freeEvents as $free)
                                    <a href="footbal_event_details.html">
                                        <div class="eventBox">
                                            <img src="{{ Storage::url($free->event_thumbnail_image) }}" alt="">
                                            <div class="eventBoxCon">
                                                <span class="pill">{{ getUserName($free->user_id) }}</span>
                                                <h2>{{ $free->event_title }}</h2>
                                                @if ($free->event_location == 'Venue')
                                                    <h6>{{ $free->event_venue }}</h6>
                                                    <h6>{{ $free->event_venue_name }}</h6>
                                                    <h6>{{ $free->event_date }} ,{{ $free->event_start_time }}
                                                        -{{ $free->event_end_time }}</h6>
                                                @elseif ($free->event_location == 'Online Event')
                                                    <h6>
                                                        Online Url: {{ $free->event_online_link }}
                                                    </h6>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div id="Paid" class="tabcontent">

                        @if ($paidEvent->isEmpty())
                            <div class="emptyCategory">
                                <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                                <h4>No events in this Category</h4>
                                <p>Try a different Category</p>
                            </div>
                        @else
                            <div class="eventGrid">
                                @foreach ($paidEvent as $paid)
                                    <a href="footbal_event_details.html">
                                        <div class="eventBox">
                                            <img src="{{ Storage::url($paid->event_thumbnail_image) }}" alt="">
                                            <div class="eventBoxCon">
                                                <span class="pill">{{ getUserName($paid->user_id) }}</span>
                                                <h2>{{ $paid->event_title }}</h2>
                                                @if ($paid->event_location == 'Venue')
                                                    <h6>{{ $paid->event_venue }}</h6>
                                                    <h6>{{ $paid->event_venue_name }}</h6>
                                                    <h6>{{ $paid->event_date }} ,{{ $paid->event_start_time }}
                                                        -{{ $paid->event_end_time }}</h6>
                                                @elseif ($paid->event_location == 'Online Event')
                                                    <h6>
                                                        Online Url: {{ $paid->event_online_link }}
                                                    </h6>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
