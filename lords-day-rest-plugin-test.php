<?php
/*
Plugin Name: Lord's Day Rest Plugin (Test Version)
Description: Test version of the Lord's Day Rest Plugin to simulate rest mode.
Version: 1.0
Author: Eric Zosso of Zoseco Incorporated of Valparaiso Indiana
License: GPL2
*/

// Hook into template_redirect to control front-end display
add_action('template_redirect', 'lords_day_rest_test');

// Function to check if it's the Lord's Day and put the site to rest
function lords_day_rest_test() {
    // Simulate Sunday for testing (set to true to test rest mode; false for production)
    $is_sunday = true;

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
    // Check if it's The Lord's Day (0 = Sunday) or simulated Sunday
    if ($is_sunday || $now->format('w') == 0) {
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

        // Get the site's title
        $site_title = get_bloginfo('name');

        // Output the rest message with the full Bible quote and custom styling
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head><title>' . esc_html($site_title) . ' is Resting</title>';
        echo '<style>';
        echo 'body {';
        echo '    background-color: #f5f5dc;'; // Cream background
        echo '    color: #00918b;'; // Royal Turquoise text
        echo '    font-family: "Century Schoolbook", Georgia, serif;'; // Font with fallback
        echo '    text-align: center;';
        echo '    padding: 50px;';
        echo '}';
        echo 'h1 {';
        echo '    font-size: 2.5em;';
        echo '}';
        echo 'p {';
        echo '    font-size: 1.2em;';
        echo '}';
        echo '</style>';
        echo '</head>';
        echo '<body>';
        echo '<h1>' . esc_html($site_title) . ' is Resting</h1>';
        echo '<p>This website\'s owner is celebrating the Lord\'s Day and is currently unavailable.</p>';
        echo '<p>"Six days shalt thou labour, and shalt do all thy works. But on the seventh day is the sabbath of the Lord thy God: thou shalt do no work on it, thou nor thy son, nor thy daughter, nor thy manservant, nor thy maidservant, nor thy beast, nor the stranger that is within thy gates." - Exodus 20:9-10 (Douay-Rheims)</p>';
        echo '<p>Please visit us again tomorrow.</p>';
        echo '</body>';
        echo '</html>';
        exit;
    }
    // If not the Lord's Day, let the site load normally
}