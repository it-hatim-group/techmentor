<?php

use App\Models\SoftwareSetting;

if (!function_exists('setting')) {

    function setting($key = null)
    {
        static $settings = null;

        if ($settings === null) {
            $settings = SoftwareSetting::first();
        }

        if (!$settings) {
            return null;
        }

        if ($key) {
            return $settings->$key ?? null;
        }

        return $settings;
    }
}
