@extends('frontend.index_master')
@section('frontend')
    <!-- ---------------------------------------------------- Banner Section ------------------------- ------------ -->

    @include('frontend.index-content.banner')
    <!-- ---------------------------------------------------- Trending Section ------------------------- ------------ -->
    @include('frontend.index-content.trending')

    <!-- ---------------------------------------------------- Category Section ------------------------- ------------ -->

    <section class="conSection categorySection">
        <div class="container">
            <div class="advertisementArea slideTopRevel">
                <a href="footbal_event_details.html" class="">
                    <img src="{{ asset('frontend/assets/image/event/football_ads2.png') }}" alt="">
                </a>
            </div>
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

                <div id="All" class="tabcontent">
                    <div class="eventGrid">

                        <a href="footbal_event_details.html">
                            <div class="eventBox">
                                <img src="{{ asset('frontend/assets/image/event/football_league_2024/football1.jpg') }}"
                                    alt="">
                                <div class="eventBoxCon">
                                    <span class="pill">Tripura Football Association</span>
                                    <h2>"B" Division Football League-2024-25</h2>
                                    <h6>UK Academy Mini Stadium</h6>
                                    <h6>19-07-2024 to 16-08-2024</h6>
                                </div>
                            </div>
                        </a>
                        <a href="#">
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
                        </a>
                    </div>
                    <a href="events.html" class="viewLink slideTopRevel">View All Events</a>
                </div>
                <div id="Week" class="tabcontent">

                    <!-- If No Data  -->
                    <div class="emptyCategory">
                        <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                        <h4>No events in this Category</h4>
                        <p>Try a different Category</p>
                    </div>
                    <!-- If No Data  -->

                </div>
                <div id="Online" class="tabcontent">

                    <!-- If No Data  -->
                    <div class="emptyCategory">
                        <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                        <h4>No events in this Category</h4>
                        <p>Try a different Category</p>
                    </div>
                    <!-- If No Data  -->

                </div>
                <div id="Offline" class="tabcontent">
                    <div class="eventGrid">
                        <a href="#">
                            <div class="eventBox ">
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
                            <div class="eventBox ">
                                <img src="{{ asset('frontend/assets/image/event/2.jpg') }}" alt="">
                                <div class="eventBoxCon">
                                    <span class="pill">TW Department</span>
                                    <h2>James Dain's Fiction Writing Playground</h2>
                                    <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                    <h6>Free</h6>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="eventBox ">
                                <img src="{{ asset('frontend/assets/image/event/3.jpg') }}" alt="">
                                <div class="eventBoxCon">
                                    <span class="pill">TW Department</span>
                                    <h2>James Dain's Fiction Writing Playground</h2>
                                    <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                    <h6>From $20.00</h6>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>


                <div id="Free" class="tabcontent">
                    <div class="eventGrid">
                        <a href="#">
                            <div class="eventBox ">
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
                            <div class="eventBox ">
                                <img src="{{ asset('frontend/assets/image/event/2.jpg') }}" alt="">
                                <div class="eventBoxCon">
                                    <span class="pill">TW Department</span>
                                    <h2>James Dain's Fiction Writing Playground</h2>
                                    <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                    <h6>Free</h6>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="eventBox ">
                                <img src="{{ asset('frontend/assets/image/event/3.jpg') }}" alt="">
                                <div class="eventBoxCon">
                                    <span class="pill">TW Department</span>
                                    <h2>James Dain's Fiction Writing Playground</h2>
                                    <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                    <h6>From $20.00</h6>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
                <div id="Paid" class="tabcontent">

                    <!-- If No Data  -->
                    <div class="emptyCategory">
                        <img src="{{ asset('frontend/assets/image/calendar.png') }}" alt="">
                        <h4>No events in this Category</h4>
                        <p>Try a different Category</p>
                    </div>
                    <!-- If No Data  -->

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
                    <h2><span class="counter" data-target="833">0</span> +</h2>
                    <h4>Total Events</h4>
                </div>
                <div class="achievement">
                    <h2><span class="counter" data-target="174">0</span> +</h2>
                    <h4>Upcoming Events</h4>
                </div>
                <div class="achievement">
                    <h2><span class="counter" data-target="133">0</span> +</h2>
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
