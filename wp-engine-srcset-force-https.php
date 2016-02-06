<?php
/**
 * Plugin Name: WP Engine Srcset Force HTTPS
 * Plugin URI: http://salferrarello.com/wp-engine-srcset-force-https/
 * Description: Force WP Engine sites to use HTTPS when generating srcset image urls. This only applies to production sites, staging sites are unaffected. Non-WP Engine sites are also unaffected. Requires PHP 5.3 or above, which is present on all WP Engine installs.
 * Version: 0.1.0
 * Author: Sal Ferrarello
 * Author URI: http://salferrarello.com/
 * Text Domain: wp-engine-force-srcset-https
 *
 * @package FE\Wpe_Srcset_Force_Https
 * @author Sal Ferrarello
 * @copyright 2016 Iron Code Studio
 * @license GPL-2.0+
 */

namespace FE\Wpe_Srcset_Force_Https;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'wp_calculate_image_srcset', 'FE\Wpe_Srcset_Force_Https\wp_calculate_image_srcset' );
add_filter( 'fe_wpe_srcset_https', 'FE\Wpe_Srcset_Force_Https\is_wpe_snapshot' );

/**
 * Force srcset URLs to https, when `fe_wpe_srcset_https` filter is true
 *
 * @param  array $sources array of sources used in srcset.
 * @return array
 */
function wp_calculate_image_srcset( $sources ) {

	if ( apply_filters( 'fe_wpe_srcset_https', false ) ) {
		foreach ( $sources as &$source ) {
			$source['url'] = set_url_scheme( $source['url'], 'https' );
		}
	}
	return $sources;
}

/**
 * Is this a WP Engine snapshot
 *
 * This looks for and uses the global is_wpe_snapshot() function
 * This function is in the Fe\Wpe_Srcset_Force_Https namespace, which
 * is why it came have the same name as the global function.
 *
 * @return bool
 */
function is_wpe_snapshot() {
	return function_exists( '\is_wpe_snapshot' ) && ! \is_wpe_snapshot();
}
