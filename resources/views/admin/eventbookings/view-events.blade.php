@extends('admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-4">
                                <h4 class="card-title">Events Data</h4>

                                <a href="/admin/events-bookings">Back</a>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Event title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Artisanal kale"
                                        id="example-text-input" value="{{ $viewEventDetails->event_title }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-search-input" class="col-sm-2 col-form-label">Event category</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"
                                        value="{{ $viewEventDetails->event_category }}" id="example-search-input" readonly>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Event Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="example-email-input" rows="3" readonly>{{ $viewEventDetails->event_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-tel-input" class="col-sm-2 col-form-label">Event Image</label>
                                <img src="{{ Storage::url($viewEventDetails->event_thumbnail_image) }}" class="rounded me-2"
                                    style="width:500px; align:center" alt="Event Image" requi>

                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-number-input" class="col-sm-2 col-form-label">Event date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-number-input"
                                        value="{{ $viewEventDetails->event_date }}" readonly>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">

                                <label class="form-label col-sm-2">Event start and ending time</label>
                                <div class="col-sm-10">
                                    <div class="input-daterange input-group col-sm-10" id="datepicker6">
                                        <input type="text" class="form-control" name="start" placeholder="Start Date"
                                            value="{{ $viewEventDetails->event_start_time }}" />
                                        <input type="text" class="form-control" name="end" placeholder="End Date"
                                            value="{{ $viewEventDetails->event_end_time }}" />
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-password-input" class="col-sm-2 col-form-label">Event Location</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="example-password-input"
                                        value="{{ $viewEventDetails->event_location }}" readonly>
                                </div>
                            </div>
                            @if ($viewEventDetails->event_location == 'Venue')
                                <div class="row mb-3">
                                    <label for="example-date-input" class="col-sm-2 col-form-label">Event Venue</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"
                                            value="{{ $viewEventDetails->event_venue }}" id="example-date-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-month-input" class="col-sm-2 col-form-label">Event venue
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"
                                            value="{{ $viewEventDetails->event_venue_name }}" id="example-month-input">
                                    </div>
                                </div>
                            @endif
                            <!-- end row -->
                            @if ($viewEventDetails->event_location == 'Online')
                                <div class="row mb-3">
                                    <label for="example-week-input" class="col-sm-2 col-form-label">Event Online
                                        link</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"
                                            value="{{ $viewEventDetails->event_online_link }}" id="example-week-input">
                                    </div>
                                </div>
                            @endif
                            <!-- end row -->
                            @if ($viewEventDetails->event_ticket_type == 'Free')
                            @else
                                <div class="row mb-3">
                                    <label for="example-time-input" class="col-sm-2 col-form-label">Event Slot</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"
                                            value="{{ $viewEventDetails->event_slot_no }}" id="example-time-input">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-time-input" class="col-sm-2 col-form-label">Event Ticket
                                        cost</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text"
                                            value="{{ $viewEventDetails->event_ticket_cost }}" id="example-time-input">
                                    </div>
                                </div>
                            @endif
                            <div class="row mb-3">
                                <label for="example-time-input" class="col-sm-2 col-form-label">event ticket
                                    type</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"
                                        value="{{ $viewEventDetails->event_ticket_type }}" id="example-time-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-time-input" class="col-sm-2 col-form-label">Event Status</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"
                                        value="{{ $viewEventDetails->is_approve == 1 ? 'Approved' : 'Rejected' }}"
                                        id="example-time-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-time-input" class="col-sm-2 col-form-label">Event is
                                    featured</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"
                                        value="{{ $viewEventDetails->is_featured == 1 ? 'Activate' : 'Deactivated' }}"
                                        id="example-time-input">
                                </div>
                            </div>
                            <script>
                                document.querySelectorAll('input').forEach(input => input.readOnly = true);
                            </script>
                            <!-- end row -->

                            <!-- end row -->

                            <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
