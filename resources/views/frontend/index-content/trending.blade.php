 <section class="conSection trendingSection">
     <div class="container">
         <div class="sectionTitle">
             <h3 class="slideTopRevel"> Top Trending Events</h3>
             <div class="line slideTopRevel"></div>
             <p class="slideTopRevel">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod</p>
         </div>
         @php
             $trendingContent = App\Models\Event::where('is_approve', 1)
                 ->orderBy('created_at', 'desc') //
                 ->limit(10)
                 ->get();
         @endphp
         <div class="slide-container swiper">
             <div class="slide-content-event">
                 <div class="card-wrapper swiper-wrapper">


                     @foreach ($trendingContent as $trending)
                         <div class="card swiper-slide">
                             <a href="{{ '/event-details/' . encryptId($trending->id) }}">
                                 <div class="eventBox">
                                     <img src="{{ Storage::url($trending->event_thumbnail_image) }}" alt="">
                                     <div class="eventBoxCon">
                                         <span class="pill">{{ getUserName($trending->user_id) }}</span>
                                         <h2>{{ $trending->event_title }}</h2>
                                         <h6>{{ $trending->event_title }}|
                                             @if ($trending->event_location == 'Venue')
                                                 {{ $trending->event_venue }}
                                             @elseif ($trending->event_location == 'Online Event')
                                                 {{ $trending->event_online_link }}
                                             @else
                                                 location Not define
                                             @endif
                                         </h6>
                                         <h6>{{ $trending->event_date }} :-
                                             {{ $trending->event_start_time }} -
                                             {{ $trending->event_end_time }}</h6>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     @endforeach






                 </div>
             </div>

             <div class="swiper-button-next swiper-navBtn"></div>
             <div class="swiper-button-prev swiper-navBtn"></div>
         </div>

     </div>
 </section>
