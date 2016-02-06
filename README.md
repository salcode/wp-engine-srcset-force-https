WP Engine Srcset Force HTTPS
============================

This plugin forces WP Engine sites to use HTTPS when generating srcset image urls. This only applies to production sites, staging sites are unaffected. Non-WP Engine sites are also unaffected. Requires PHP 5.3 or above due to the use of namespaces. WP Engine is running 5.3 or above so this shouldn't be a problem unless you run this plugin somewhere else with less than PHP 5.3

## Problem

I've seen a number of sites running on WP Engine that were originally setup with a non-https URL (e.g. the Site Address and URL Address are `http://example.com/` instead of https), however these sites are now running on `https` through the magic of WP Engine.  Unforunately, the WP Engine magic that makes this possible does not cover the `srcset` attribute.

## Solution

The solution to these woes is to update your site URL (or URLs in the case of multisite) to `https`, but this can be a non-trivial task.

## Trivial Solution

The trivial solution is to force all your `srcset` values to use `https` by running this plugin.

## Other Possible Solutions

- Disable responsive images, which I've done in the past as a temporary solution.
- WP Engine offers __HTML Post-Processing__, which allows you to use regular expressions to update URLs after the page is rendered but before it is delivered to the browser.  This is a great tool.  Unfortunately, the rules get messy (and outside my skillset) when dealing with srcset and multisite (feel free to take this line as a challenge and craft some WP Engine compatibile regular expression that makes this plugin unneeded).

## Credits

Sal Ferrarello  
2016 Iron Code Studio  
GPL 2.0+  



