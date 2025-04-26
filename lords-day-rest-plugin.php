<?php
/*
Plugin Name: Lord's Day Rest Plugin
Description: Puts the website into sleep mode on the Lord's Day based on the site's timezone, displaying the Lord's Message as a reminder. Conveniently by giving a 503 response, Search Engine Optimization (SEO) should not take a hit.  Go enjoy your day of rest.
Version: 1.0
Author: Eric Zosso of Zoseco Incorporated of Valparaiso Indiana
License: GPL2
*/

// Hook into template_redirect to control front-end display
add_action('template_redirect', 'lords_day_rest');

// Function to check if it's the Lord's Day and put the site to rest
function lords_day_rest() {
    // Get the site's timezone from WordPress settings
    $timezone_string = get_option('timezone_string');
    if (empty($timezone_string)) {
        // Default to Central Time (America/Chicago) if not set
        $timezone = new DateTimeZone('America/Chicago');
    } else {
        $timezone = new DateTimeZone($timezone_string);
    }

    // Get current time in the site's timezone
    $now = new DateTime('now', $timezone);
    // Check if it's The Lord's Day (0 = Sunday, properly referred to as Lord's Day, for the day Jesus resurrected)
    if ($now->format('w') == 0) {
        // Calculate seconds until Monday 00:00:00
        $monday = clone $now;
        $monday->modify('+1 day');
        $monday->setTime(0, 0, 0);
        $seconds_until_monday = $monday->getTimestamp() - $now->getTimestamp();

        // Set HTTP headers for temporary unavailability
        header('HTTP/1.1 503 Service Unavailable');
        header('Retry-After: ' . $seconds_until_monday);
        header('Content-Type: text/html; charset=utf-8');
        // Prevent caching
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Output the rest message with the full Bible quote
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head><title>Website Resting</title></head>';
        echo '<body style="text-align: center; padding: 50px;">';
        echo '<h1>Website is Resting</h1>';
        echo '<p>This website\'s owner is celebrating the Lord\'s Day and is currently unavailable.</p>';
        echo '<p>"Six days shalt thou labour, and shalt do all thy works. But on the seventh day is the sabbath of the Lord thy God: thou shalt do no work on it, thou nor thy son, nor thy daughter, nor thy manservant, nor thy maidservant, nor thy beast, nor the stranger that is within thy gates." - Exodus 20:9-10 (Douay-Rheims)</p>';
        echo '<p>Please visit us again tomorrow.</p>';
        echo '</body>';
        echo '</html>';
        exit;
    }
    // If not the Lord's Day, let the site load normally
}