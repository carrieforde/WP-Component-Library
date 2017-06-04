<?php
/**
 * Fonts Component
 *
 * @since   0.0.0
 * @package WP_Component_Library
 */

// Set the post ID if one wasn't passed.
if ( ! $post_id ) {
	$post_id = get_the_ID();
}

// If this is used within flexible content, we need to component prefix.
$prefix = ( ! empty( $component ) ) ? 'component_' . $count . '_' : '';

// This block's fields.
$fonts = get_post_meta( $post_id, $prefix . 'fonts', true );

// Start the markup. ?>

<section class="wpcl-component component-fonts">

	<div class="fonts">

		<?php for ( $i = 0; $i < $fonts; $i++ ) :

			$sass_var = get_post_meta( $post_id, $prefix . 'fonts_' . $i . '_sass_variable', true );
			$font_stack = get_post_meta( $post_id, $prefix . 'fonts_' . $i . '_font_stack', true ); ?>

			<div class="font-stack" style="font-family: <?php echo esc_attr( $font_stack ); ?>"><?php echo esc_html( $sass_var . ': ' . $font_stack ); ?></div>
		<?php endfor; ?>
	</div>
</section>
