@extends('frontend.index_master')
@section('frontend')
    <section class="basicPage">
        <div class="conSection">
            <div class="container">
                <div class="fullEventGrid">
                    <div class="fullEventLeft">
                        <div class="bannerSlider">
                            <div class="slider-wrapper">

                                @foreach ($getEventDetails as $eventDetails)
                                    <div class="banner">
                                        <div class="fullEventImage">
                                            <img src="{{ asset('storage/' . $eventDetails->event_thumbanail_image) }}"
                                                alt="">
                                        </div>

                                    </div>
                                @endforeach
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
                        </p>
                        {{-- <p>It is a long established fact that a reader will be distracted by the readable content of a --}}
                        page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters, as opposed to using 'Content here, content
                        here', making it look like readable English. Many desktop publishing packages and web page
                        editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
                        uncover many web sites still in their infancy. Various versions have evolved over the years,
                        sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>

                    <div class="fullEventRight">
                        <div class="fullEventInfo">
                            <span class="pill">TW Department</span>
                            <h2>Monsoon Online Singing Competition 2024</h2>
                            <p><i class="fa-regular fa-bookmark"></i>Music</p>
                            <p><i class="fa-regular fa-calendar"></i>June 16 | 3:14PM - July 20 | 9:14PM</p>
                            <p><i class="fa-regular fa-compass"></i></i>Online</p>
                            <div class="fullEventPrice">
                                <h3>₹333 onwards</h3>
                                <a href="#">Ticket</a>
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

                            </div>

                        </div>
                    </div>

                    <div class="swiper-button-next swiper-navBtn"></div>
                    <div class="swiper-button-prev swiper-navBtn"></div>
                </div>
            </div>
        </div>


    </section>
@endsection
