@php
    $getEventBanner = App\Models\Event::where('is_featured', 1)->get();

@endphp


<section class="bannerSec">
    <div class="bannerSlider">
        <div class="slider-wrapper">

            @foreach ($getEventBanner as $eventBanner)
                @if ($eventBanner->is_featured === 1)
                    <div class="banner">
                        <div class="eventThubmnail">
                            <img src="{{ Storage::url($eventBanner->event_thumbnail_image) }}" alt="">
                        </div>
                        <div class="eventCon">
                            <div class="container">
                                <div>
                                    <h6>{{ $eventBanner->event_date }} :-
                                        {{ $eventBanner->event_start_time }} -
                                        {{ $eventBanner->event_end_time }}</h6>
                                    <h2>{{ $eventBanner->event_title }}|
                                        @if ($eventBanner->event_location == 'Venue')
                                            {{ $eventBanner->event_venue }}
                                        @elseif ($eventBanner->event_location == 'Online Event')
                                            {{ $eventBanner->event_online_link }}
                                        @else
                                            location Not define
                                        @endif
                                    </h2>
                                    <a href="footbal_event_details.html"><button><i class="fa-solid fa-caret-right"></i>
                                            Explore</button></a>
                                </div>

                            </div>
                        </div>
                    </div>
                @else
                @endif
            @endforeach

            {{-- <div class="banner">
                <div class="eventThubmnail">
                    <img src="{{ asset('fronted/assets/image/event/1.jpg') }}" alt="">
                </div>
                <div class="eventCon">
                    <div class="container">
                        <div>
                            <h6>Sunday, July 28</h6>
                            <h2>Real Estate Event in Mumbai | Dubai Properties</h2>
                            <a href="event-details.html"><button><i class="fa-solid fa-caret-right"></i>
                                    Explore</button></a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="banner">
                <div class="eventThubmnail">
                    <img src="{{ asset('fronted/assets/image/event/2.jpg') }}" alt="">
                </div>
                <div class="eventCon">
                    <div class="container">
                        <div>
                            <h6>Sunday, July 28</h6>
                            <h2>Corporate Unplugged C-Suite Connect: CHRO & CXO Networking Mixer</h2>
                            <a href="event-details.html"><button><i class="fa-solid fa-caret-right"></i>
                                    Explore</button></a>
                        </div>

                    </div>
                </div>
            </div> --}}

        </div>
        <button class="prev" onclick="prevSlide()"><i class="fa-solid fa-caret-left"></i></button>
        <button class="next" onclick="nextSlide()"><i class="fa-solid fa-caret-right"></i></button>
    </div>
</section>
