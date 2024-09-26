<?php

use App\Models\User;
use App\Models\Event;


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
