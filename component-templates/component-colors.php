<?php
/**
 * Colors Component
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
$color_group = get_post_meta( $post_id, $prefix . 'color_group', true );

// Start the markup. ?>

<section class="wpcl-component component-colors">

	<?php for ( $i = 0; $i < $color_group; $i++ ) : ?>
		
		<div class="color-group">
			<?php

			$label = get_post_meta( $post_id, $prefix . 'color_group_' . $i . '_group_label', true );
			$colors = get_post_meta( $post_id, $prefix . 'color_group_' . $i . '_colors', true ); ?>

			<h3 class="label"><?php echo esc_html( $label ); ?></h3>

			<div class="colors">

				<?php for ( $j = 0; $j < $colors; $j++ ) :

					$color = get_post_meta( $post_id, $prefix . 'color_group_' . $i . '_colors_' . $j . '_color', true );
					$name = get_post_meta( $post_id, $prefix . 'color_group_' . $i . '_colors_' . $j . '_color_name', true ); ?>

					<div class="color-chip">
						<div class="color" style="background-color: <?php echo esc_attr( $color ); ?>;"></div>
						<span class="color-name"><?php echo esc_html( $name . ' : ' . $color ); ?></span>
					</div>
				<?php endfor; ?>
			</div><!-- .colors -->
		</div><!-- .color-group -->
	<?php endfor; ?>
</section>
