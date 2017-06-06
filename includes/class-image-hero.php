<?php
/**
 * WP Component Library Image Hero.
 *
 * @since   0.0.0
 * @package WP_Component_Library
 */

/**
 * WP Component Library Image Hero.
 *
 * @since 0.0.0
 */
class WPCL_Image_Hero {

	/**
	 * Set the element name.
	 */
	private $component_name = 'image_hero';

	/**
	 * Parent plugin class.
	 *
	 * @since 0.0.0
	 *
	 * @var   WP_Component_Library
	 */
	protected $plugin = null;

	/**
	 * Constructor.
	 *
	 * @since  0.0.0
	 *
	 * @param  WP_Component_Library $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  0.0.0
	 */
	public function hooks() {
		add_filter( 'after_theme_setup', array( $this, 'add_hero_image_size' ) );
	}

	/**
	 * Add an image size for the hero image.
	 */
	public function add_hero_image_size() {

		add_image_size( 'hero-image', 1920, 500, true );
	}
}
