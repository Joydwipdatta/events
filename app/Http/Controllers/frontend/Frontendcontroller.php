<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Eventgallery;
use Illuminate\Http\Request;
use App\Models\Eventsgallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Frontendcontroller extends Controller
{
    // public function userDashboard()
    // {
    //
    //     return view('frontend.dashboard.user_dashboard', compact('registeredEvents'));
    // }
    public function eventDetails($event_id)
    {
        $event_id = decryptId($event_id);
        $getEventDetails = Event::find($event_id);
        $getApprovedEvents = Event::where('is_approve', 1)->get();

        return view('frontend.dashboard.event-details', compact('getEventDetails', 'getApprovedEvents'));
    }
    public function createEvent()
    {
        return view('frontend.dashboard.create_event');
    }
    public function  storeEventForm(Request $request)
    {
        $request->validate([

            'event_title' => 'required|string|max:255',
            'event_category' => 'required|string',
            'event_description' => 'required|string',
            'event_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg',
            'event_date' => 'required|date',
            'event_start_time' => 'required|date_format:H:i',
            'event_end_time' => 'required|date_format:H:i|after:event_start_time',
            'event_location' => 'required|string',
            // ], [
            //     'event_title.required' => 'The Event Title field is required.',
            //     'event_category.required' => 'The Event Category field is required.',
            //     'event_description.required' => 'The Event Description field is required.',
            //     'event_date.required' => 'The Event Date field is required.',
            //     'event_start_time.required' => 'The Event Start Time field is required.',
            //     'event_end_time.after' => 'The Event End Time must be after the start time.',
            //     'event_location.required' => 'The Event Location field is required.',
        ]);
        $id = decryptId($request->user_id);


        // Handle the thumbnail image upload if present
        $thumbnailPath = $request->file('event_thumbnail_image')->store('public');
        $eventDate = Carbon::createFromFormat('Y-m-d', $request->input('event_date'))->format('d-M-Y');
        $eventTicketType = $request->has('event_ticket_type') ? 'Free' : 'Paid';

        // Create and save the event
        $event = new Event;
        $event->user_id = $id;
        $event->event_title = $request->event_title;
        $event->event_category = $request->event_category;
        $event->event_description = $request->event_description;
        $event->event_thumbnail_image = $thumbnailPath;
        $event->event_date =
            $eventDate;
        $event->event_start_time = $request->event_start_time;
        $event->event_end_time = $request->event_end_time;
        $event->event_location = $request->event_location;
        $event->event_venue = $request->event_venue;
        $event->event_venue_name = $request->event_venue_name;
        $event->event_online_link = $request->event_online_link;
        $event->event_ticket_cost = $request->event_ticket_cost;
        $event->event_slot_no = $request->event_slot_no;
        $event->event_freepass_no = $request->event_freepass_no;

        // if ($request->event_ticket_type === 'Free') {
        //     // Set to null if 'Free'
        //     $event->event_ticket_cost = null;
        //     $event->event_freepass_no = null;
        // } else {
        //     // Otherwise, store the values
        //     $event->event_ticket_cost = $request->event_ticket_cost;
        //     $event->event_freepass_no = $request->event_freepass_no;
        // }
        $event->event_ticket_type = $eventTicketType;
        $event->save();


        if ($request->hasFile('event_gallery_image')) {
            $eventImages = $request->file('event_gallery_image');
            // dd($request->file('event_gallery_image'));

            foreach ($eventImages as $image) {
                $storeEventGalleryImage = $image->store('public');
                $storeImages = Eventgallery::create([
                    'event_id' => $event->id,
                    'event_gallery_image' => $storeEventGalleryImage,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Event created successfully!');
    }
    public function editEvent($event_id)
    {
        $eventDetails = Event::find($event_id);
        $getEventGallery = Eventgallery::where('event_id', $event_id)->get();
        return view('frontend.dashboard.edit_create_event', compact('eventDetails', 'getEventGallery'));
    }

    public function updateEventForm(Request $request)
    {
        // $request->validate([
        //     'event_title' => 'required|string|max:255',
        //     'event_category' => 'required|string',
        //     'event_description' => 'required|string',
        //     'event_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'event_date' => 'required|date',
        //     'event_start_time' => 'required|date_format:H:i',
        //     'event_end_time' => 'required|date_format:H:i|after:event_start_time',
        //     'event_location' => 'required|string',
        // ]);

        $id = decryptId($request->user_id);

        // Find the existing event
        $event = Event::findOrFail($request->event_id); // Assuming you pass the event ID

        // Update event details
        $event->user_id = $id;
        $event->event_title = $request->event_title;
        $event->event_category = $request->event_category;
        $event->event_description = $request->event_description;
        $event->event_date = $request->event_date;
        $event->event_start_time = $request->event_start_time;
        $event->event_end_time = $request->event_end_time;
        $event->event_location = $request->event_location;
        $event->event_venue = $request->event_venue;
        $event->event_venue_name = $request->event_venue_name;
        $event->event_online_link = $request->event_online_link;
        $event->event_ticket_cost = $request->event_ticket_cost;
        $event->event_slot_no = $request->event_slot_no;
        $event->event_freepass_no = $request->event_freepass_no;
        $event->event_ticket_type = $request->event_ticket_type;

        // Handle the thumbnail image upload if present
        if ($request->hasFile('event_thumbnail')) {
            // Store the new thumbnail image
            $thumbnailPath = $request->file('event_thumbnail')->store('public');
            $event->event_thumbnail_image = $thumbnailPath; // Update the path only if a new image is uploaded
        }

        $event->save(); // Save the event details

        // Remove existing gallery images
        Eventgallery::where('event_id', $event->id)->delete(); // Delete all existing gallery images for the event
        // Handle gallery images
        if ($request->hasFile('event_gallery_image')) {
            $eventImages = $request->file('event_gallery_image');

            foreach ($eventImages as $image) {
                $storeEventGalleryImage = $image->store('public');
                Eventgallery::create([
                    'event_id' => $event->id,
                    'event_gallery_image' => $storeEventGalleryImage,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Event updated successfully!');
    }

    public function deleteEventImage($id)
    {
        $image = Eventgallery::find($id);

        if ($image) {
            // Delete the file from the storage
            Storage::delete($image->event_gallery_image);

            // Delete the image record from the database
            $image->delete();

            return response()->json(['message' => 'Image deleted successfully.'], 200);
        }

        return response()->json(['error' => 'Image not found.'], 404);
    }
}
