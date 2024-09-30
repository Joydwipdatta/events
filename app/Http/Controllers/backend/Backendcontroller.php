<?php

namespace App\Http\Controllers\backend;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
    public  function addAdvertisement(Request $request)
    {
        $request->validate([
            'ad_image' =>   'required|image|mimes:jpeg,png,jpg,|max:5000',
            'valid_upto' => 'required',
        ]);

        $storeImage = $request->file('ad_image')->store('public');
        $addAdvertisement = Advertisement::create([
            'valid_upto' => $request->valid_upto,
            'ad_image' => $storeImage,
            'is_approve' => $request->is_approve,
        ]);
        if ($addAdvertisement) {
            return back()->with([
                'message' => 'ad updated  successfully ',
                'alert-type' => 'success'
            ]);
        } else {
            return back()->with(['message' => 'Advertisement Not Added', 'alert_type' => 'error']);
        }
    }
    public function deleteADs($adid)
    {


        $decryptId = decryptId($adid);

        $adDelete = Advertisement::find($decryptId);

        if ($adDelete) {
            // Delete the event
            Storage::delete($adDelete->ad_image);
            $adDelete->delete();

            return redirect()->back()->with([
                'message' => 'Ad Deleted successfully ',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'AD  image not found ',
                'alert-type' => 'error'
            ]);
        }
    }
    public function addisFeatured($id)
    {
        $data = Advertisement::find($id);


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
}
