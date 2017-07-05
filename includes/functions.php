<?php
/**
 * WP Component Library Component.
 *
 * @since   0.0.0
 * @package WP_Component_Library
 */

add_filter( 'after_theme_setup', 'wpcl_add_hero_image_size' );
/**
 * Add an image size for the hero image.
 */
function wpcl_add_hero_image_size() {

	add_image_size( 'hero-image', 1920, 500, true );
}
