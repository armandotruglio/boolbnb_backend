<?php

namespace App\Functions;

class Address
{

    public static function encodeQueryAddress($address)
    {
        return urlencode($address);
    }

    public static function buildApi($encodedAddress)
    {
        return file_get_contents('https://api.tomtom.com/search/2/geocode/' . $encodedAddress . '.json' . "?key=" . env("TOMTOM_KEY"));
    }
}
