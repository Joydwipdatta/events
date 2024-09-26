@extends('frontend.index_master')
@section('frontend')

    <section class="basicPage ">
        <div class="conSection">
            <div class="container">
                <div class="sectionTitle">
                    <h3 class="">Manage your events</h3>
                    <div class="line"></div>
                    <p class="">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod</p>
                </div>

                <div class="ManageEventTab">
                    <div class="ManageEventTabButtons">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'all')" id="defaultOpen">All
                                Events</button>
                            <button class="tablinks" onclick="openCity(event, 'upcoming')">Upcoming
                                Event</button>
                            <button class="tablinks" onclick="openCity(event, 'past')">Past Events</button>
                        </div>
                        <a href="/create-event" class="crEvent">Create Event</a>
                    </div>
                    @php
                        $registeredEvents = App\Models\Event::where('user_id', Auth::id())->get();
                    @endphp

                    <div id="all" class="tabcontent">
                        <table class="manageEventTable">
                            <thead>
                                <tr>
                                    <th>All Events</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registeredEvents as $event)
                                    <tr>
                                        <td class="eventConRow">
                                            <img src="{{ Storage::url($event->event_thumbnail_image) }}" alt="">
                                            <div>
                                                <h5>{{ $event->event_title }}</h5>
                                                <p>{{ $event->event_venue }}</p>
                                                <p>{{ $event->event_date }} |
                                                    {{ $event->event_start_time }} - {{ $event->event_end_time }}</p>
                                                <p>{{ $event->event_ticket_type }}</p>
                                            </div>
                                        </td>
                                        <td class="eventOperationRow">
                                            <a href="{{ '/edit-event/' . $event->id }}"><i class="fa-solid fa-pen"></i></a>
                                            <a href="{{ ' /event/details/' . $event->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                            <a href="/event-details"><i class="fa-regular fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- <tr>
                                    <td class="eventConRow">
                                        <img src="assets/image/event/3.jpg" alt="">
                                        <div>
                                            <h5>Monsoon Online Singing Competition 2024</h5>
                                            <p>Ramnagar, Agartala, Tripura</p>
                                            <p>June 16 2024 | 3:14PM - 9:14PM</p>
                                            <p>Free</p>
                                        </div>
                                    </td>
                                    <td class="eventOperationRow">
                                        <a href="#"><i class="fa-solid fa-pen"></i></a>
                                        <a href="#"><i class="fa-regular fa-trash-can"></i></a>
                                        <a href="#"><i class="fa-regular fa-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="eventConRow">
                                        <img src="assets/image/event/1.jpg" alt="">
                                        <div>
                                            <h5>Monsoon Online Singing Competition 2024</h5>
                                            <p>Ramnagar, Agartala, Tripura</p>
                                            <p>June 16 2024 | 3:14PM - 9:14PM</p>
                                            <p>Free</p>
                                        </div>
                                    </td>
                                    <td class="eventOperationRow">
                                        <a href="#"><i class="fa-solid fa-pen"></i></a>
                                        <a href="#"><i class="fa-regular fa-trash-can"></i></a>
                                        <a href="#"><i class="fa-regular fa-eye"></i></a>
                                    </td>
                                </tr> --}}

                            </tbody>
                        </table>
                    </div>
                    <div id="upcoming" class="tabcontent">
                        <table class="manageEventTable">
                            <thead>
                                <tr>
                                    <th>Upcoming Events</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="eventConRow">
                                        <img src="assets/image/event/3.jpg" alt="">
                                        <div>
                                            <h5>Monsoon Online Singing Competition 2024</h5>
                                            <p>Ramnagar, Agartala, Tripura</p>
                                            <p>June 16 2024 | 3:14PM - 9:14PM</p>
                                            <p>Free</p>
                                        </div>
                                    </td>
                                    <td class="eventOperationRow">
                                        <a href="#"><i class="fa-solid fa-pen"></i></a>
                                        <a href="#"><i class="fa-regular fa-trash-can"></i></a>
                                        <a href="#"><i class="fa-regular fa-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="eventConRow">
                                        <img src="assets/image/event/2.jpg" alt="">
                                        <div>
                                            <h5>Monsoon Online Singing Competition 2024</h5>
                                            <p>Ramnagar, Agartala, Tripura</p>
                                            <p>June 16 2024 | 3:14PM - 9:14PM</p>
                                            <p>Free</p>
                                        </div>
                                    </td>
                                    <td class="eventOperationRow">
                                        <a href="#"><i class="fa-solid fa-pen"></i></a>
                                        <a href="#"><i class="fa-regular fa-trash-can"></i></a>
                                        <a href="#"><i class="fa-regular fa-eye"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div id="past" class="tabcontent">
                        <!-- If No Data  -->
                        <div class="emptyCategory">
                            <img src="assets/image/calendar.png" alt="">
                            <h4>No events Found</h4>
                        </div>
                        <!-- If No Data  -->

                        <!-- <table class="manageEventTable">
                                                                                                                                                                                                                                                                                                                                                                                                                                        <thead>
                                                                                                                                                                                                                                                                                                                                                                                                                                            <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <th>Upcoming Events</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <th>Operation</th>
                                                                                                                                                                                                                                                                                                                                                                                                                                            </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                        </thead>
                                                                                                                                                                                                                                                                                                                                                                                                                                        <tbody>

                                                                                                                                                                                                                                                                                                                                                                                                                                            <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <td class="eventConRow">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src="assets/image/event/3.jpg" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <h5>Monsoon Online Singing Competition 2024</h5>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <p>Ramnagar, Agartala, Tripura</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <p>June 16 2024 | 3:14PM - 9:14PM</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <p>Free</p>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                <td class="eventOperationRow">
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a href="#"><i class="fa-solid fa-pen"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a href="#"><i class="fa-regular fa-trash-can"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                            </tr>

                                                                                                                                                                                                                                                                                                                                                                                                                                        </tbody>
                                                                                                                                                                                                                                                                                                                                                                                                                                    </table> -->
                    </div>

                </div>

            </div>

        </div>
    </section>
