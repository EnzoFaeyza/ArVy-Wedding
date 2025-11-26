<?php

return [
    /*
    |--------------------------------------------------------------------------
    | RSVP Delivery Preferences
    |--------------------------------------------------------------------------
    |
    | Controls how RSVP confirmations are delivered. When "use_whatsapp" is
    | enabled the application expects a WAHA (WhatsApp HTTP API) instance and
    | will send vouchers to the provided WhatsApp number instead of email.
    |
    */

    'use_whatsapp' => (bool) env('RSVP_USE_WHATSAPP', false),

    /*
    |--------------------------------------------------------------------------
    | WhatsApp Number Normalization
    |--------------------------------------------------------------------------
    |
    | WAHA requires chat identifiers in international format (e.g. 62812...).
    | If most guests submit local numbers that start with "0", provide the
    | default country code (without +) so we can normalize automatically.
    |
    */

    'default_country_code' => env('RSVP_DEFAULT_COUNTRY_CODE'),
];

