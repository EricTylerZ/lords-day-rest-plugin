<?php
/*
Plugin Name: Lord's Day Rest Plugin
Description: A must-have WordPress plugin for strong Christians and Catholics who want to honor the Lord's Day by putting their website into rest mode; displaying a message from the Lord and maintaining some SEO care with a 503 response. Use /?test_lords_day=1 to test on any page.
Version: 1.1
Author: Eric Zosso of Zoseco Incorporated of Valparaiso Indiana
Author URI: https://zoseco.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Hook into template_redirect to control front-end display
add_action('template_redirect', 'lords_day_rest');

// Function to check if it's the Lord's Day or test mode and put the site to rest
function lords_day_rest() {
    // Check for test mode
    $test_mode = isset($_GET['test_lords_day']) && $_GET['test_lords_day'] == '1';

    // Get the site's timezone from WordPress settings
    $timezone_string = get_option('timezone_string');
    $offset = get_option('gmt_offset');

    if (!empty($timezone_string)) {
        $timezone = new DateTimeZone($timezone_string);
    } else {
        // If no timezone string, use the offset to adjust UTC time
        $timezone = new DateTimeZone('UTC');
    }

    // Get current UTC time
    $now_utc = new DateTime('now', new DateTimeZone('UTC'));

    // If timezone_string is set, use it directly
    if (!empty($timezone_string)) {
        $local_time = new DateTime('now', $timezone);
    } else {
        // Adjust UTC time by the offset (handles +6 and -6 correctly)
        $local_time = clone $now_utc;
        if ($offset >= 0) {
            $local_time->add(new DateInterval('PT' . $offset . 'H'));
        } else {
            $local_time->sub(new DateInterval('PT' . abs($offset) . 'H'));
        }
    }

    // Check if it's The Lord's Day (0 = Sunday)
    $is_sunday = ($local_time->format('w') == 0);

    if ($is_sunday || $test_mode) {
        // Calculate the next Monday at 00:00:00 in local time
        $monday = clone $local_time;
        $monday->modify('next Monday');
        $monday->setTime(0, 0, 0);
        $seconds_until_monday = $monday->getTimestamp() - $local_time->getTimestamp();
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
            echo 'Current local time: ' . $local_time->format('Y-m-d H:i:s') . '<br>';
            echo 'Timezone: ' . (empty($timezone_string) ? 'Offset ' . $offset . ' hours' : $timezone_string) . '<br>';
            echo 'UTC offset: ' . ($offset >= 0 ? '+' : '-') . abs($offset) . ' hours<br>';
            echo 'Is Lord\'s Day: ' . ($is_sunday ? 'Yes' : 'No') . '<br>';
            echo 'Hours until Monday: ' . $hours_until_monday . '<br>';
            echo '</p>';
        }

        echo '</body>';
        echo '</html>';
        exit;
    }
    // If not the Lord's Day and/or not test mode, let the site load normally
}