@extends('admin_master')
@section('title', 'Registrations')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Bookings</h4>


                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Event Title</th>
                                        <th>Organization Name</th>
                                        <th>Date</th>
                                        <th>Ticket types</th>
                                        <th>Event Times</th>
                                        <th>Approve Event</th>
                                        <th>Feature Status</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($eventBookings as $booking)
                                        <tr>
                                            <td>{{ $booking->event_title }}</td>

                                            {{-- <td>{{ $booking->phone }}</td> --}}
                                            <td>{{ getUserName($booking->user_id) }}</td>
                                            <td>{{ $booking->event_date }}</td>
                                            <td>{{ $booking->event_ticket_type }}
                                            </td>
                                            <td>{{ $booking->event_start_time }} || {{ $booking->event_end_time }}</td>
                                            <td>
                                                <a href="/event/approve/{{ $booking->id }}" type="button"
                                                    class="btn btn-sm btn-{{ $booking->is_approve ? 'success' : 'danger' }}">
                                                    {{ $booking->is_approve ? 'Approved' : 'Rejected' }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/event/featured/{{ $booking->id }}" type="button"
                                                    class="btn btn-sm btn-{{ $booking->is_featured ? 'success' : 'danger' }}">
                                                    {{ $booking->is_featured ? 'Activate' : 'Deactivate' }}
                                                </a>
                                            </td>

                                            <td><a href="/admmin/view/event-booking/{{ $booking->id }}"
                                                    class="btn btn-primary "><i class="ri-eye-line center-icon"></i></a>
                                            </td>





                                        </tr>
                                    @endforeach

                                    {{-- <tr>
                                        <td>Joydeep</td>
                                        <td>PQR Organization</td>
                                        <td>17/09/2024</td>
                                        <td>ABC Auditorium</td>
                                        <td>Service A, Service D</td>
                                        <td>
                                            <span class="badge rounded-pill bg-success fs-6 text">Approved</span>
                                            <!-- <span class="badge rounded-pill bg-warning fs-6 text">Pending</span>
                                                                        <span class="badge rounded-pill bg-danger fs-6 text">Rejected</span> -->
                                        </td>
                                        <td><a href="/admin/full-registrations" class="btn btn-primary">Manage</a></td>
                                    </tr> --}}


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>


@endsection
