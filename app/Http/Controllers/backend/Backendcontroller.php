<?php

namespace App\Http\Controllers\backend;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Backendcontroller extends Controller
{
    public function showEventBooking(Request $request)
    {
        $eventBookings = Event::all();

        return view('admin.eventbookings.event-bookings', compact('eventBookings'));
    }
    public function viewEvents($id)
    {
        $viewEventDetails = Event::find($id);
        return view('admin.eventbookings.view-events', compact('viewEventDetails'));
    }
    public function eventIsApproved($id)
    {
        $data = Event::find($id);

        // $data->paid = $request->paid;
        // $data->save();
        if ($data) {
            if ($data->is_approve) {

                $data->is_approve = 0;
            } else {
                $data->is_approve = 1;
            }

            $data->save();
            // dd($data->save);
        }

        return back();

        // return redirect to

    }
    public function eventIsFeatured($id)
    {
        $data = Event::find($id);

        // $data->paid = $request->paid;
        // $data->save();
        if ($data) {
            if ($data->is_featured) {

                $data->is_featured = 0;
            } else {
                $data->is_featured = 1;
            }

            $data->save();
            // dd($data->save);
        }

        return back();

        // return redirect to

    }
}
