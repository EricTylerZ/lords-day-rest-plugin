# Lord's Day Rest Plugin

A must-have WordPress plugin for strong Christians and Catholics who want to honor the Lord's Day (Sunday) by putting their website into rest mode. It displays a Bible quote and ensures SEO-friendliness with a 503 response—perfect for making your site Christian-friendly and Catholic-friendly. (We believe Catholicism is the true form of Christianity, but we'll save the debate for later. Stay tuned for an LLM debate-mode solving this)

## Description

The **Lord's Day Rest Plugin** helps Christian and Catholic website owners observe the Sabbath by making their site unavailable on Sundays. It shows a faith-inspired message with a quote from Exodus 20:9-10 (Douay-Rheims Bible) and calculates the hours until Monday. Using a 503 Service Unavailable status, it keeps your site SEO-friendly during this temporary downtime.

### Features
- Activates on the Lord's Day based on your WordPress timezone (supports strings and offsets like +6 or -6).
- Shows your site's title (e.g., "YourSite is Resting") with a scripture-based message.
- Calculates hours until Monday midnight in your local timezone.
- SEO-friendly with a 503 response and Retry-After header.
- Test mode: admins can add `?test_lords_day=1` to any URL to preview the rest mode.

The plugin fixes timezone offset issues (e.g., correctly handling +6 and -6) by adjusting UTC time accurately, ensuring a seamless experience for all users.

## Installation
1. Upload `lords-day-rest-plugin.php` to `/wp-content/plugins/lords-day-rest-plugin`.
2. Activate it via the WordPress 'Plugins' screen.
3. Verify your timezone in Settings > General > Timezone.

## Testing
To test without waiting for Sunday:
1. Log in as an admin.
2. Add `?test_lords_day=1` to any URL (e.g., `yoursite.com/?test_lords_day=1`).
3. View the rest message and test details like local time and offset.

## License
Licensed under GPLv2 or later. See the [LICENSE](LICENSE) file.