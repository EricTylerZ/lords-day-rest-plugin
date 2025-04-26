=== Lord's Day Rest Plugin === Contributors: erictylerz Tags: Lord's Day, Sabbath, Christian, Catholic, Bible, scripture, rest, downtime, SEO-friendly, temporary unavailability, WordPress plugin, faith Requires at least: 5.0 Tested up to: 6.6 Stable tag: 1.0 License: GPLv2 or later License URI: https://www.gnu.org/licenses/gpl-2.0.html

A must-have WordPress plugin for strong Christians who want to honor the Lord's Day by putting their website into rest mode, displaying a Bible quote and maintaining SEO with a 503 response.

== Description == The Lord's Day Rest Plugin is perfect for Christian website owners who observe the Lord's Day (Sunday) as a sacred day of rest. This plugin automatically makes your website unavailable on Sundays, displaying a faith-inspired message with a Bible quote from Exodus 20:9-10 (Douay-Rheims). It uses a 503 Service Unavailable status code to ensure search engines recognize the downtime as temporary, keeping your site SEO-friendly.

Key features:

Detects the Lord's Day based on your WordPress timezone (supports both timezone strings and offsets like +6 or -6 hours).

Displays your site's title (e.g., "YourSite is Resting") with a scripture-based rest message.

Shows the hours until Monday at midnight, calculated accurately for your timezone.

SEO-friendly with a 503 response and Retry-After header.

Test mode for admins: add ?test_lords_day=1 to any URL to preview the rest mode.

It's a must-have for strong Christians and Catholics (Catholics are Christian to the unaware) looking to make their website Christian-friendly while respecting the Sabbath rest.

== Installation ==
Upload the lords-day-rest-plugin.php file to the /wp-content/plugins/lords-day-rest-plugin directory, or install via the WordPress plugins screen.

Activate the plugin through the 'Plugins' screen in WordPress.

Check your timezone in Settings > General > Timezone (works with strings like "America/Chicago" or offsets like -6).

== Frequently Asked Questions == = What happens on the Lord's Day? = The front-end shows a rest message with a Bible quote and a 503 status, while admins can still access the backend.

= Does this hurt my SEO? = No, the 503 status ensures search engines treat the downtime as temporary.

= How do I test it? = Log in as an admin and append ?test_lords_day=1 to any URL to see the rest message and test variables.

= What if my timezone offset looks wrong? = The plugin handles offsets (e.g., +6 or -6) by adjusting UTC time correctly, avoiding display issues.

== Changelog == = 1.0 =
Initial release with unified production and test modes.

== Upgrade Notice == = 1.0 = Start honoring the Lord's Day with this faith-focused plugin.