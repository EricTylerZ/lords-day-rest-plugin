# Lord's Day Rest Plugin

A must-have WordPress plugin for strong Christians and Catholics who want to honor the Lord's Day by putting their website into rest mode; displaying a message from the Lord and maintaining some SEO care with a 503 response. Test it anytime by adding `/?test_lords_day=1` to any page (e.g., `yoursite.com/?test_lords_day=1`). (We believe Catholicism is not only Christian, but is the true form of Christianity, but we'll save the debate for later. Stay tuned for an LLM debate-mode solving this and bringing spiritual communion back to the Orthodox and the Protestants)

## Description

The **Lord's Day Rest Plugin** is perfect for Christian website owner, whether Catholic, Eastern Orthodox, or even Protestants who observe the Lord's Day as a sacred day of rest. This plugin automatically makes your website unavailable on the Lord's Day, displaying a message from the Lord, Exodus 20:9-10 (Douay-Rheims Bible). It uses a 503 Service Unavailable status code to keep your site SEO-friendly during this temporary downtime.

### Features
- Activates on the Lord's Day based on your WordPress timezone (supports strings and offsets like +6 or -6).
- Displays your site's title (e.g., "YourSite is Resting") with a message from the Lord's own mouth.
- Calculates hours until Monday midnight in your local timezone.
- SEO-friendly with a 503 response and Retry-After header.
- Test mode: add `?test_lords_day=1` to any URL to preview the rest mode.

This plugin is a must-have for strong Christians and Catholics looking to make their website Christian-friendly and Catholic-friendly while respecting the Sabbath.

## Installation
1. Upload `lords-day-rest-plugin.php` to `/wp-content/plugins/lords-day-rest-plugin`.
2. Activate it via the WordPress 'Plugins' screen.
3. Verify your timezone in Settings > General > Timezone.

## Testing
To test without waiting for the Lord's Day:
1. Add `?test_lords_day=1` to any URL (e.g., `yoursite.com/?test_lords_day=1`).
2. View the rest message and test details like local time and offset.

## License
Licensed under GPLv2 or later. See the [LICENSE](LICENSE) file.