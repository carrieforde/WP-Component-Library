<?php
/**
 * WP Component Library Component.
 *
 * @since   0.0.0
 * @package WP_Component_Library
 */

require_once dirname( __FILE__ ) . '/../vendor/cpt-core/CPT_Core.php';
require_once dirname( __FILE__ ) . '/functions.php';

/**
 * WP Component Library Component post type class.
 *
 * @since 0.0.0
 *
 * @link   https://github.com/WebDevStudios/CPT_Core
 */
class WPCL_Component extends CPT_Core {
	/**
	 * Parent plugin class.
	 *
	 * @var WP_Component_Library
	 * @since  0.0.0
	 */
	protected $plugin = null;

	/**
	 * Constructor.
	 *
	 * Register Custom Post Types.
	 *
	 * See documentation in CPT_Core, and in wp-includes/post.php.
	 *
	 * @since  0.0.0
	 *
	 * @param  WP_Component_Library $plugin Main plugin object.
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();

		// Register this cpt.
		// First parameter should be an array with Singular, Plural, and Registered name.
		parent::__construct(
			array(
				__( 'Component', 'wp-component-library' ),
				__( 'Components', 'wp-component-library' ),
				'wpcl-component',
			),
			array(
				'supports'  => array(
					'title',
					'editor',
					'thumbnail',
				),
				'menu_icon' => 'dashicons-archive',
				'public'    => true,
				'rewrite'   => array( 'slug' => 'components' ),
			)
		);
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since  0.0.0
	 */
	public function hooks() {
	}

	/**
	 * Registers admin columns to display. Hooked in via CPT_Core.
	 *
	 * @since  0.0.0
	 *
	 * @param  array $columns Array of registered column names/labels.
	 * @return array          Modified array.
	 */
	public function columns( $columns ) {
		$new_column = array();
		return array_merge( $new_column, $columns );
	}

	/**
	 * Handles admin column display. Hooked in via CPT_Core.
	 *
	 * @since  0.0.0
	 *
	 * @param array   $column   Column currently being rendered.
	 * @param integer $post_id  ID of post to display column for.
	 */
	public function columns_display( $column, $post_id ) {
		switch ( $column ) {
		}
	}

	/**
	 * Retrieve the name of the highest priority template file that exists.
	 *
	 * Searches in the STYLESHEETPATH before TEMPLATEPATH so that themes which
	 * inherit from a parent theme can just overload one file. If the template is
	 * not found in either of those, it looks in the theme-compat folder last.
	 *
	 * Modified from example on Pippin's Plugins.
	 *
	 * @link  https://pippinsplugins.com/template-file-loaders-plugins/
	 *
	 * @since 0.0.0
	 *
	 * @param string|array $template_names Template file(s) to search for, in order.
	 * @param bool $load If true the template file will be loaded if it is found.
	 * @param bool $require_once Whether to require_once or require. Default true.
	 *                            Has no effect if $load is false.
	 * @return string The template filename if one is located.
	 */
	public function locate_component_template( $template_names, $load = false, $require_once = true ) {

		// No file found yet
		$located = false;

		// Try to find a template file
		foreach ( (array) $template_names as $template_name ) {

			// Continue if template is empty.
			if ( empty( $template_name ) ) {
				continue;
			}

			// Trim off any slashes from the template name
			$template_name = ltrim( $template_name, '/' );

			// Check child theme first.
			if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'template-parts/components/' . $template_name ) ) {
				$located = trailingslashit( get_stylesheet_directory() ) . 'template-parts/components/' . $template_name;
				break;

			// Check parent theme next.
			} elseif ( file_exists( trailingslashit( get_template_directory() ) . 'template-parts/components/' . $template_name ) ) {
				$located = trailingslashit( get_template_directory() ) . 'template-parts/components/' . $template_name;
				break;

			// Check theme compatibility last.
			} elseif ( file_exists( trailingslashit( $this->plugin->path ) . 'component-templates/' . $template_name ) ) {
				$located = trailingslashit( $this->plugin->path ) . 'component-templates/' . $template_name;
				break;
			}
		}

		if ( ( true === $load ) && ! empty( $located ) ) {
			load_template( $located, $require_once );
		}

		return $located;
	}

	/**
	 * Retrieves a template part
	 *
	 * Modified from example on Pippin's Plugins.
	 *
	 * @link  https://pippinsplugins.com/template-file-loaders-plugins/
	 *
	 * @since 0.0.0
	 *
	 * @param string $slug
	 * @param string $name Optional. Default null
	 */
	public function get_component_template_part( $slug, $name = null, $load = true ) {

		// Execute code for this part
		do_action( 'get_template_part_' . $slug, $slug, $name );

		// Setup possible parts
		$templates = array();

		if ( isset( $name ) ) {
			$templates[] = $slug . '-' . $name . '.php';
		}

		$templates[] = $slug . '.php';

		// Allow template parts to be filtered
		$templates = apply_filters( 'get_component_template_part', $templates, $slug, $name );

		// Return the part that is found
		return $this->locate_component_template( $templates, $load, false );
	}

	/**
	 * Cycle through flexible content and display the corresponding markup.
	 *
	 * @param  int  $post_id  ID of the post.
	 * @author      Carrie Forde
	 */
	public function display_component( $post_id = 0 ) {

		// Get the post id.
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		// Get our data.
		$component = get_post_meta( $post_id, 'component', true );

		// Bail if we don't have a component.
		if ( ! $component ) {
			return;
		}

		// Determine which layout to grab.
		foreach ( (array) $component as $count => $component ) {

			include( $this->get_component_template_part( 'component', $component, false ) );
		}
	}

	/**
	 * Get the component markup for output in component meta.
	 *
	 * @param   int  $post_id  The Post ID. By passing a post ID, the hero can be used outside the loop.
	 * @return  string         The component markup.
	 * @author                 Carrie Forde
	 */
	public function get_component_markup( $post_id = 0 ) {

		ob_start();
		$this->display_component();
		return ob_get_clean();
	}

	/**
	 * Get the implementation meta.
	 *
	 * @param int  $post_id  The post ID.
	 */
	public function get_single_meta_value( $post_id = 0, $field = '' ) {

		// Get the post id.
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		// Get component implementation.
		return get_post_meta( $post_id, $field, true );
	}

	/**
	 * Display implementation.
	 */
	public function display_implementation( $post_id = 0 ) {

		// Check if we have implementation meta.
		if ( empty( $this->get_single_meta_value( $post_id, 'implementation' ) ) ) {
			return;
		}

		// Implementation markup. ?>
		<div class="code-implementation">
			<header class="meta-heading">
				<h2><?php esc_html_e( 'Implementation', 'wp-component-library' ); ?></h2>
			</header>
			<pre>
				<code class="language-php"><?php echo esc_html( $this->get_single_meta_value( $post_id, 'implementation' ) ); ?></code>
			</pre>
		</div><!-- .code-implementation -->
		
		<?php
	}

	/**
	 * Display related components.
	 */
	public function display_related_components( $post_id = 0 ) {

		// Get the post id.
		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		// Get related components.
		$related = get_post_meta( $post_id, 'related_components', true );

		// Bail if no related components.
		if ( ! $related ) {
			return '';
		}

		// Related component markup. ?>
		<div class="component-meta component-related">
			<header class="meta-heading">
				<h2><?php esc_html_e( 'Related Components', 'wp-component-library' ); ?></h2>
			</header>
			<ul>
				<?php foreach ( $related as $post ) : ?>
					<li><a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div><!-- .component-related -->

		<?php
	}

	/**
	 * Get the data for the code tabs.
	 *
	 * @param  int  $post_id  The Post ID.
	 */
	public function get_tab_data( $post_id = 0 ) {

		$args = array();

		if ( ! empty( $this->get_component_markup() ) ) {
			$args['html'] = array(
				'data'     => $this->get_component_markup(),
				'language' => 'html',
				'tab_name' => 'HTML',
			);
		}
		if ( ! empty( $this->get_single_meta_value( $post_id, 'php_template' ) ) ) {
			$args['php_template'] = array(
				'data'     => $this->get_single_meta_value( $post_id, 'php_template' ),
				'language' => 'php',
				'tab_name' => 'PHP Template',
			);
		}
		if ( ! empty( $this->get_single_meta_value( $post_id, 'php_logic' ) ) ) {
			$args['php_logic'] = array(
				'data'     => $this->get_single_meta_value( $post_id, 'php_logic' ),
				'language' => 'php',
				'tab_name' => 'PHP Logic',
			);
		}
		if ( ! empty( $this->get_single_meta_value( $post_id, 'sass' ) ) ) {
			$args['sass'] = array(
				'data'     => $this->get_single_meta_value( $post_id, 'sass' ),
				'language' => 'scss',
				'tab_name' => 'Sass',
			);
		}
		if ( ! empty( $this->get_single_meta_value( $post_id, 'javascript' ) ) ) {
			$args['javascript'] = array(
				'data'     => $this->get_single_meta_value( $post_id, 'javascript' ),
				'language' => 'javascript',
				'tab_name' => 'JavaScript',
			);
		}

		return $args;
	}

	/**
	 * Display the tabbed code meta.
	 *
	 * @param  int  $post_id  The Post ID.
	 */
	public function display_code_tabs( $post_id = 0 ) {

		// Get the tab data.
		$tab_data = $this->get_tab_data();

		// Bail if we don't have tab data.
		if ( ! $tab_data ) {
			return;
		}

		// Build tab ?>
		<div id="code-tabs" class="code-tabs">
			<header class="meta-heading">
				<h2><?php esc_html_e( 'Code', 'wp-component-library' ); ?></h2>
			</header>
			
			<ul>
				<?php foreach ( $tab_data as $key => $value ) : ?>
					<li><a href="#<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value['tab_name'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>

			<?php foreach ( $tab_data as $key => $value ) : ?>
				<div id="<?php echo esc_attr( $key ); ?>">
					<pre>
						<code class="language-<?php echo esc_attr( $value['language'] ); ?>">
							<?php echo esc_html( $value['data'] ); ?>
						</code>
					</pre>
				</div>
			<?php endforeach; ?>
		</div><!-- .code-tabs -->
		<?php
	}

	/**
	 * Build the markup for the component meta.
	 *
	 * @param   int  $post_id  ID of the post for which to display the meta.
	 */
	public function display_component_meta( $post_id = 0 ) {

		// Bail if we're not showing the code.
		if ( 'no' === $this->get_single_meta_value( $post_id, 'show_code' ) ) {
			return;
		}

		echo '<div class="wp-component-meta">';

		// Implementation code.
		$this->display_implementation();

		// Tabs.
		$this->display_code_tabs();

		// Related components.
		$this->display_related_components();
		echo '</div><!-- .wp-component-meta -->';
	}
}
