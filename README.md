# WPWeeWX

Display WeeWX JSON weather data with a shortcode.

## Plugin Info

- Contributors: Joey Troy
- Requires at least: 6.0
- Tested up to: 6.6
- Requires PHP: 8.0
- Stable tag: 0.1.0

## Description

WPWeeWX fetches WeeWX-generated JSON and renders responsive weather dashboards.

## Installation

1. Upload the plugin folder to `/wp-content/plugins/`.
2. Activate the plugin in WordPress.
3. Install the WeeWX JSON generator (weewx-json) from https://github.com/teeks99/weewx-json/releases.
4. Configure JSON URLs under Settings → WeeWX Weather.

## Usage

Use `[weewx_weather]` or specify attributes:

`[weewx_weather source="simple" view="current"]`

## Changelog

### 0.1.0

- Initial release.
