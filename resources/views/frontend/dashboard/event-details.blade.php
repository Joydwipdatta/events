@extends('frontend.index_master')
@section('frontend')
    <section class="basicPage">
        <div class="conSection">
            <div class="container">
                <div class="fullEventGrid">
                    <div class="fullEventLeft">
                        <div class="bannerSlider">
                            <div class="slider-wrapper">


                                <div class="banner">
                                    <div class="fullEventImage">
                                        <img src="{{ Storage::url($getEventDetails->event_thumbnail_image) }}"
                                            alt="">

                                    </div>
                                </div>

                                {{-- <div class="banner">
                                    <div class="fullEventImage">
                                        <img src="assets/image/event/2.jpg" alt="">
                                    </div>

                                </div>
                                <div class="banner">
                                    <div class="fullEventImage">
                                        <img src="assets/image/event/3.jpg" alt="">
                                    </div>

                                </div> --}}
                            </div>
                            {{-- <button class="prev" onclick="prevSlide()"><i class="fa-solid fa-caret-left"></i></button>
                            <button class="next" onclick="nextSlide()"><i class="fa-solid fa-caret-right"></i></button> --}}
                        </div>
                        <h3>About this event</h3>
                        <p>

                            {{ $getEventDetails->event_description }}

                        </p>
                    </div>

                    <div class="fullEventRight">
                        <div class="fullEventInfo">
                            <span class="pill">{{ getUserName($getEventDetails->user_id) }}</span>
                            <h2>{{ $getEventDetails->event_title }}</h2>
                            <p><i class="fa-regular fa-bookmark"></i>{{ $getEventDetails->event_title }}</p>
                            <p><i class="fa-regular fa-calendar"></i>{{ $getEventDetails->event_date }} |
                                {{ $getEventDetails->event_start_time }} - {{ $getEventDetails->event_end_time }} </p>
                            @if ($getEventDetails->event_location == 'Online Event')
                                <p><i class="fa-regular fa-compass"></i></i>Link:{{ $getEventDetails->event_online_link }}
                                </p>
                            @elseif ($getEventDetails->event_location == 'Venue')
                                <p><i class="fa-regular fa-compass"></i></i>Location:{{ $getEventDetails->event_venue }}
                                    , {{ $getEventDetails->event_venue_name }}
                                </p>
                            @else
                                <p><i class="fa-regular fa-compass"></i></i>No Event Venue Updated
                                </p>
                            @endif
                            <div class="fullEventPrice">
                                @if ($getEventDetails->event_ticket_type === 'Free')
                                    <h3>Free Entry</h3>
                                @else
                                    <h3>{{ $getEventDetails->event_ticket_cost }}</h3>
                                    <a href="#">Ticket</a>
                                @endif
                            </div>
                        </div>
                        <div class="adsCon">
                            <img src="assets/image/ads/1.jpg" alt="">
                        </div>
                        <div class="adsCon">
                            <img src="assets/image/ads/2.jpg" alt="">
                        </div>
                    </div>

                </div>
                <div class="sectionTitle">
                    <h3 class="">Other events you may like</h3>
                    <div class="line"></div>
                    <p class="">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod</p>
                </div>
                <div class="slide-container swiper">
                    <div class="slide-content-event">
                        <div class="card-wrapper swiper-wrapper">
                            @foreach ($getApprovedEvents as $approved)
                                <div class="card swiper-slide">
                                    <a href="{{ '/event-details/' . encryptId($approved->id) }}">
                                        <div class="eventBox">
                                            <img src="{{ Storage::url($approved->event_thumbnail_image) }}" alt="">
                                            <div class="eventBoxCon">
                                                <span class="pill">{{ getUserName($approved->user_id) }}</span>
                                                <h2>{{ $approved->event_title }}</h2>
                                                <h6>{{ $approved->event_date }}•
                                                    {{ $approved->event_start_time }}</h6>
                                                @if ($approved->event_ticket_type == 'Free')
                                                    <h6>Free</h6>
                                                @else
                                                    <h6>{{ $approved->event_ticket_cost }}</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{-- <div class="card swiper-slide">
                                <a href="#">
                                    <div class="eventBox">
                                        <img src="assets/image/event/2.jpg" alt="">
                                        <div class="eventBoxCon">
                                            <span class="pill">TW Department</span>
                                            <h2>James Dain's Fiction Writing Playground</h2>
                                            <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                            <h6>Free</h6>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="card swiper-slide">
                                <a href="#">
                                    <div class="eventBox">
                                        <img src="assets/image/event/3.jpg" alt="">
                                        <div class="eventBoxCon">
                                            <span class="pill">TW Department</span>
                                            <h2>James Dain's Fiction Writing Playground</h2>
                                            <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                            <h6>From $20.00</h6>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="card swiper-slide">
                                <a href="#">
                                    <div class="eventBox">
                                        <img src="assets/image/event/1.jpg" alt="">
                                        <div class="eventBoxCon">
                                            <span class="pill">TW Department</span>
                                            <h2>James Dain's Fiction Writing Playground</h2>
                                            <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                            <h6>From $20.00</h6>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="card swiper-slide">
                                <a href="#">
                                    <div class="eventBox">
                                        <img src="assets/image/event/1.jpg" alt="">
                                        <div class="eventBoxCon">
                                            <span class="pill">TW Department</span>
                                            <h2>James Dain's Fiction Writing Playground</h2>
                                            <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                            <h6>From $20.00</h6>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="card swiper-slide">
                                <a href="#">
                                    <div class="eventBox">
                                        <img src="assets/image/event/1.jpg" alt="">
                                        <div class="eventBoxCon">
                                            <span class="pill">TW Department</span>
                                            <h2>James Dain's Fiction Writing Playground</h2>
                                            <h6>Thu, Jul 25 • 9:00 AM GMT+5:30</h6>
                                            <h6>Free</h6>
                                        </div>
                                    </div>
                                </a>

                            </div> --}}

                        </div>
                    </div>

                    <div class="swiper-button-next swiper-navBtn"></div>
                    <div class="swiper-button-prev swiper-navBtn"></div>
                </div>
            </div>
        </div>


    </section>
@endsection
