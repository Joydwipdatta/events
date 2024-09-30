@extends('frontend.index_master')
@section('frontend')
    <!-- ---------------------------------------------------- Banner Section ------------------------- ------------ -->

    @include('frontend.index-content.banner')
    <!-- ---------------------------------------------------- Trending Section ------------------------- ------------ -->
    @include('frontend.index-content.trending')

    <!-- ---------------------------------------------------- Category Section ------------------------- ------------ -->

    <section class="conSection categorySection">
        <div class="container">
            {{-- <div class="advertisementArea slideTopRevel">
                <a href="footbal_event_details.html" class="">
                    <img src="{{ asset('frontend/assets/image/event/football_ads2.png') }}" alt="">
                </a>
            </div> --}}
            <div class="sectionTitle">
                <h3 class="">Event Categories</h3>
                <div class="line slideTopRevel"></div>
                <p class="slideTopRevel">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod</p>
            </div>
            <div class="categoryGrid">
                <a href="#">
                    <div class="category slideTopRevel">
                        <img src="{{ asset('frontend/assets/image/3d-mic.png') }}" alt="">
                        <p>Music</p>
                    </div>
                </a>
                <a href="#">
                    <div class="category slideTopRevel">
                        <img src="{{ asset('frontend/assets/image/investment.png') }}" alt="">
                        <p>Business</p>
                    </div>
                </a>
                <a href="#">
                    <div class="category slideTopRevel">
                        <img src="{{ asset('frontend/assets/image/fast-food.png') }}" alt="">
                        <p>Food & Drink</p>
                    </div>
                </a>
                <a href="#">
                    <div class="category slideTopRevel">
                        <img src="{{ asset('frontend/assets/image/rocket.png') }}" alt="">
                        <p>Lanching</p>
                    </div>
                </a>
                <a href="#">
                    <div class="category slideTopRevel">
                        <img src="{{ asset('frontend/assets/image/color-palette.png') }}" alt="">
                        <p>Performing & Visual Arts</p>
                    </div>
                </a>
                <a href="#">
                    <div class="category slideTopRevel">
                        <img src="{{ asset('frontend/assets/image/trophy.png') }}" alt="">
                        <p>Sports</p>
                    </div>
                </a>

            </div>
        </div>
    </section>


    <!-- ---------------------------------------------------- Event Tabs Section ------------------------- ------------ -->

    <section class="conSection eventTabsSection">
        <div class="container">
            <div class="sectionTitle">
                <h3 class="slideTopRevel">Events in Tripura</h3>
                <div class="line slideTopRevel"></div>
                <p class="slideTopRevel">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod</p>
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
                                <a href="{{ '/event-details/' . encryptId($allEvent->id) }}">
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
                        @if (count($allEvents) > 0)
                            <a href="/all-events" class="viewLink slideTopRevel">View All Events</a>
                        @endif
                    @endif



                    {{-- <a href="#">
                            <div class="eventBox">
                                <img src="{{ asset('frontend/assets/image/event/1.jpg') }}" alt="">
                                <div class="eventBoxCon">
                                    <span class="pill">TW Department</span>
                                    <h2>James Dain's Fiction Writing Playground</h2>
                                    <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                    <h6>From $20.00</h6>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="eventBox">
                                <img src="{{ asset('frontend/assets/image/event/2.jpg') }}" alt="">
                                <div class="eventBoxCon">
                                    <span class="pill">TW Department</span>
                                    <h2>James Dain's Fiction Writing Playground</h2>
                                    <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                    <h6>Free</h6>
                                </div>
                            </div>
                        </a> --}}
                </div>

                {{-- <a href="events.html" class="viewLink slideTopRevel">View All Events</a> --}}
            </div>

            @php

                $EventsWeek = getWeekEvents();

            @endphp
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
                            <a href="{{ '/event-details/' . encryptId($weekEvent->id) }}">
                                <div class="eventBox">
                                    <img src="{{ Storage::url($weekEvent->event_thumbnail_image) }}" alt="">
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
                    @if (count($EventsWeek) > 0)
                        <a href="/all-events" class="viewLink slideTopRevel">View All Events</a>
                    @endif
                @endif
            </div>


            @php
                $onlineEvent = getOnlineEvents();
            @endphp
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
                            <a href="{{ '/event-details/' . encryptId($online->id) }}">
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
                    @if (count($onlineEvent) > 0)
                        <a href="/all-events" class="viewLink slideTopRevel">View All Events</a>
                    @endif
                @endif
                <!-- If No Data  -->

                <!-- If No Data  -->
            </div>

            @php
                $offlineEvents = getOfflineEvents();
            @endphp
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
                            <a href="{{ '/event-details/' . encryptId($offline->id) }}">
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
                    @if (count($offlineEvents) > 0)
                        <a href="/all-events" class="viewLink slideTopRevel">View All Events</a>
                    @endif
                @endif
            </div>
            @php
                $freeEvents = getFreeEvents();
            @endphp


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
                            <a href="{{ '/event-details/' . encryptId($weekEvent->id) }}">
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
                    @if (count($freeEvents) > 0)
                        <a href="" class="viewLink slideTopRevel">View All Events</a>
                    @endif
                @endif

                @php
                    $paidEvent = getPaidEvents();
                @endphp
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
                                <a href="{{ '/event-details/' . encryptId($paid->id) }}">
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
                        @if (count($paidEvent) > 0)
                            <a href="/all-events" class="viewLink slideTopRevel">View All Events</a>
                        @endif
                    @endif

                </div>
            </div>

        </div>

    </section>




    <!-- ---------------------------------------------------- Achievement Section ------------------------- ------------ -->

    <section class="conSection achivementSec">
        <div class="achivementCover">
            <img src="{{ asset('frontedn/assets/image/achievement.jpg') }}" alt="">
        </div>
        <div class="container">
            <div class="achievementFlex">
                <div class="achievement">
                    <h2><span class="counter" data-target="{{ getTotalCount() }}">0</span> +</h2>
                    <h4>Total Events</h4>
                </div>

                <div class="achievement">
                    <h2><span class="counter" data-target="{{ getUpcomingEventCount() }}">0</span> +</h2>
                    <h4>Upcoming Events</h4>
                </div>
                <div class="achievement">
                    <h2><span class="counter" data-target="{{ getEventPartneredCount() }}">0</span> +</h2>
                    <h4>Events Partnered</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- ---------------------------------------------------- Ads Section ------------------------- ------------ -->

    <section class="conSection adsSection">
        <div class="container">
            <div class="adsGrid">
                <div class="adsCon">
                    <img src="{{ asset('frontend/assets/image/ads/1.jpg') }}" alt="">
                </div>
                <div class="adsCon">
                    <img src="{{ asset('frontend/assets/image/ads/2.jpg') }}" alt="">
                </div>

                <div class="adsCon">
                    <img src="{{ asset('frontend/assets/image/ads/3.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- ---------------------------------------------------- Features Section ------------------------- ------------ -->

    <section class="conSection featureSection">
        <div class="container">
            <h2 class="slideTopRevel">Features</h2>
            <div class="featureGrid">
                <div class="featureCon slideTopRevel">
                    <i class="fa-solid fa-list-check" style="background-color: rgb(255, 223, 181);"></i>
                    <h3>Listings</h3>
                    <p>A list view of upcoming events, including essential details of the events</p>
                </div>
                <div class="featureCon slideTopRevel">
                    <i class="fa-solid fa-filter" style="background-color: rgb(175, 239, 187);"></i>
                    <h3>Filtering</h3>
                    <p>Filters that allow users to narrow down events by category, location, or date.</p>
                </div>
                <div class="featureCon slideTopRevel">
                    <i class="fa-solid fa-location-dot" style="background-color: rgb(255, 192, 185);"></i></i>
                    <h3>Locations </h3>
                    <p>Detailed information about offline events, including maps, directions, and online events.</p>
                </div>
                <div class="featureCon slideTopRevel">
                    <i class="fa-solid fa-wand-magic-sparkles" style="background-color: rgb(255, 204, 251);"></i>
                    <h3>Creation</h3>
                    <p>Create events with a simple form that includes essential fields, categories and media uploads.
                    </p>
                </div>
                <div class="featureCon slideTopRevel">
                    <i class="fa-solid fa-gear" style="background-color: rgb(248, 252, 178);"></i>
                    <h3>Management</h3>
                    <p>Manage events from a dashboard where you can view, edit or delete event details.</p>
                </div>
                <div class="featureCon slideTopRevel">
                    <i class="fa-solid fa-lock" style="background-color: rgb(197, 197, 255);"></i>
                    <h3>Support</h3>
                    <p>Get seamless support with easy access to resources and responsive teams.</p>
                </div>
            </div>


        </div>
    </section>
@endsection
