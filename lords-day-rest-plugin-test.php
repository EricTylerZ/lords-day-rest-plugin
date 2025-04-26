<?php
/*
Plugin Name: Lord's Day Rest Plugin (Test Version)
Description: Test version of the Lord's Day Rest Plugin to simulate rest mode and display test information.
Version: 1.0
Author: Eric Zosso of Zoseco Incorporated of Valparaiso Indiana
License: GPL2
*/

// Hook into template_redirect to control front-end display
add_action('template_redirect', 'lords_day_rest_test');

// Function to check if it's the Lord's Day or test mode and put the site to rest
function lords_day_rest_test() {
    // Get the site's timezone from WordPress settings
    $timezone_string = get_option('timezone_string');
    if (empty($timezone_string)) {
        $offset = get_option('gmt_offset');
        if ($offset == 0) {
            $timezone_string = 'UTC';
        } else {
            $timezone_string = 'Etc/GMT' . ($offset < 0 ? '+' : '-') . abs($offset);
        }
    }
    $timezone = new DateTimeZone($timezone_string);

    // Get current time in the site's timezone
    $now = new DateTime('now', $timezone);
    // Check if it's The Lord's Day (0 = Sunday)
    $is_sunday = ($now->format('w') == 0);
    // Check for test mode
    $test_mode = isset($_GET['test_lords_day']) && $_GET['test_lords_day'] == '1';

    if ($is_sunday || $test_mode) {
        // Calculate the next Monday at 00:00:00
        $monday = clone $now;
        $monday->modify('next Monday');
        $monday->setTime(0, 0, 0);
        $seconds_until_monday = $monday->getTimestamp() - $now->getTimestamp();
        $hours_until_monday = floor($seconds_until_monday / 3600);

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
        echo '<p>The site will be available again in approximately ' . $hours_until_monday . ' hours.</p>';
        echo '<p>Please visit us again tomorrow.</p>';

        if ($test_mode) {
            echo '<p><strong>Test Mode:</strong><br>';
            echo 'Current time: ' . $now->format('Y-m-d H:i:s') . '<br>';
            echo 'Timezone: ' . $timezone->getName() . '<br>';
            echo 'Current offset: ' . ($timezone->getOffset($now) / 3600) . ' hours<br>';
            echo 'Hours until Monday: ' . $hours_until_monday . '<br>';
            echo '</p>';
        }

        echo '</body>';
        echo '</html>';
        exit;
    }
    // If not the Lord's Day and not test mode, let the site load normally
}