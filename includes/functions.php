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

/**
 * A utility function for getting image dimensions.
 *
 * @return array The image sizes and dimensions.
 */
function wpcl_get_image_sizes( $post_id = 0 ) {

	global $_wp_additional_image_sizes;

	$post_id = get_the_ID();
	$registered_sizes = get_intermediate_image_sizes();

	foreach ( $registered_sizes as $size ) {

		if ( in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {

			$width  = get_option( "{$size}_size_w" );
			$height = get_option( "{$size}_size_h" );
			$crop   = (bool) get_option( "{$size}_crop" );

			if ( has_post_thumbnail( $post_id ) ) {
				the_post_thumbnail( $size ); ?>
				<h3><?php echo esc_html( $size ); ?></h3>
				<p>
					<?php esc_html_e( 'Width: ', 'wp-component-library' );
					echo esc_html( $width . 'px, ' );
					esc_html_e( 'Height: ', 'wp-component-library' );
					echo esc_html( $height . 'px, ' );
					esc_html_e( 'Crop: ', 'wp-component-library' );
					echo esc_html( $crop ); ?>
				</p>
				<?php
			}
		} elseif ( isset( $_wp_additional_image_sizes[ $size ] ) ) {

			$width  = $_wp_additional_image_sizes[ $size ]['width'];
			$height = $_wp_additional_image_sizes[ $size ]['height'];
			$crop   = $_wp_additional_image_sizes[ $size ]['crop'];

			if ( has_post_thumbnail( $post_id ) ) {
				the_post_thumbnail( $size ); ?>
				<div class="image-meta">
					<h3><?php echo esc_html( $size ); ?></h3>
					<p>
						<?php esc_html_e( 'Width: ', 'wp-component-library' );
						echo esc_html( $width . 'px, ' );
						esc_html_e( 'Height: ', 'wp-component-library' );
						echo esc_html( $height . 'px, ' );
						esc_html_e( 'Crop: ', 'wp-component-library' );
						echo esc_html( $crop ); ?>
					</p>
				</div>
				<?php
			}
		}
	} // End foreach.
}
