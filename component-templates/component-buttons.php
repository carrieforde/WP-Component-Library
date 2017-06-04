<?php
/**
 * Buttons Component
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
$buttons = get_post_meta( $post_id, $prefix . 'buttons', true );

// Start the markup. ?>

<section class="wpcl-component component-buttons">

	<div class="buttons">

		<?php for ( $i = 0; $i < $buttons; $i++ ) :

			$name   = get_post_meta( $post_id, $prefix . 'buttons_' . $i . '_name', true );
			$class  = get_post_meta( $post_id, $prefix . 'buttons_' . $i . '_class', true );
			$text   = get_post_meta( $post_id, $prefix . 'buttons_' . $i . '_text', true );
			$markup = get_post_meta( $post_id, $prefix . 'buttons_' . $i . '_markup', true ); ?>

			<div class="button-wrap">
				<h3><?php echo esc_html( $name ); ?></h3>
				<?php if ( 'button' === $markup ) : ?>
					<button class="<?php echo esc_attr( $class ); ?>" type="button"><?php echo esc_html( $text ); ?></button>
				<?php else : ?>
					<a class="<?php echo esc_attr( $class ); ?>" href="#"><?php echo esc_html( $text ); ?></a>
				<?php endif; ?>
			</div>
		<?php endfor; ?>
	</div>
</section>
