<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;



if (!function_exists('encryptId')) {
    function encryptId($string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'SecreT1234';
        $secret_iv = 'IV1234';
        // hash
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
}

if (!function_exists('decryptId')) {
    function decryptId($string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'SecreT1234';
        $secret_iv = 'IV1234';
        // hash
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
}
if (!function_exists('getUserName')) {
    function getUserName($string)
    {
        $userName = User::where('id', $string)->first();
        return $userName->name;
    }
}
if (!function_exists('getUserCount')) {
    function getUserCount()
    {
        return   User::where('role_type', 'user')->count();
        // return $userName->name;

    }
}
if (!function_exists('getEventCount')) {
    function getEventCount()
    {
        return   Event::count();
        // return $userName->name;

    }
}
if (!function_exists('getEventApprovedCount')) {
    function getEventApprovedCount()
    {
        return   Event::where('is_approve', 1)->count();
        // return $userName->name;

    }
}
if (!function_exists('getEventFeaturedCount')) {
    function getEventFeaturedCount()
    {
        return   Event::where('is_featured', 1)->count();
        // return $userName->name;

    }
}
if (!function_exists('getWeekEvents')) {
    function  getWeekEvents()
    {
        $today = Carbon::now()->startOfDay();
        $oneWeekFromNow = Carbon::now()->addWeek()->endOfDay();

        // Fetch events where 'created_at' is between today and one week from now
        $eventsWeek = Event::whereBetween('created_at', [$today, $oneWeekFromNow])
            ->where('is_approve', 1)
            ->get();

        return $eventsWeek;
    }
}
if (!function_exists('getAllEvents')) {
    function getAllEvents()
    {
        $allEvents = Event::where('is_approve', 1)->get();
        return $allEvents;
    }
}
if (!function_exists('getOnlineEvents')) {
    function getOnlineEvents()
    {
        $onlineEvents = Event::where('event_location', 'Online Event')->get();
        return $onlineEvents;
    }
}
if (!function_exists('getOfflineEvents')) {
    function getOfflineEvents()
    {
        $offlineEvents = Event::where('event_location', 'Venue')->get();
        return $offlineEvents;
    }
}
if (!function_exists('getFreeEvents')) {
    function getFreeEvents()
    {
        $FreeEvents = Event::where('event_ticket_type', 'Free')->get();
        return $FreeEvents;
    }
}
if (!function_exists('getPaidEvents')) {
    function getPaidEvents()
    {
        $freeEvents = Event::where('event_ticket_type', 'Paid')->get();
        return $freeEvents;
    }
}
if (!function_exists('getTotalCount')) {
    function getTotalCount()
    {
        // Counts events where 'is_approved' is 1
        return Event::where('is_approve', 1)->count();
    }
}

if (!function_exists('getUpcomingEventCount')) {
    function getUpcomingEventCount()
    {
        $today = Carbon::now();
        // Counts events where 'is_approved' is 0
        return
            Event::where('is_approve', 1)
            ->where('event_date', '>', $today)
            ->count();
    }
}
if (!function_exists('getUpcomingEvent')) {
    function getUpcomingEvent()
    {
        // Counts events where 'is_approved' is 0
        $today = now(); // Get today's date

        // Get upcoming events
        $upcomingEvents = Event::where('user_id', Auth::user()->id)
            ->where('event_date', '>', $today)
            ->get();

        return $upcomingEvents;
    }
}
if (!function_exists('getPastEvent')) {
    function getPastEvent()
    {
        // Counts events where 'is_approved' is 0
        $today = now(); // Get today's date

        // Get upcoming events
        $pastEvents = Event::where('user_id', Auth::user()->id)
            ->where('event_date', '<', $today)
            ->get();

        return $pastEvents;
    }
}

if (!function_exists('getEventPartneredCount')) {
    function getEventPartneredCount()
    {
        // Counts total number of events
        return User::where('role_type', 'user')->count();
    }
}
if (!function_exists('getAllAds')) {
    function getAllAds()
    {
        return Advertisement::all();
    }
}
if (!function_exists('getAllAdsValidupto')) {
    function getAllAdsValidupto()
    {
        return Advertisement::whereColumn('valid_upto', '<=', 'created_at')
            ->where('is_approve', 1)
            ->get();
    }
}
