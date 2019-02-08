<?php

/**
 * Contains methods for customizing the theme customization screen.
 */
class TheTheme_Customizer {

	/**
	 * Holds the instance of this class.
	 *
	 * @access private
	 * @var    object
	 */
	private static $instance;

	public function __construct() {

		// Add options to the theme customizer.
		add_action( 'customize_register', array( $this, 'thetheme_customize_register' ) );

	}

	/**
	 * This hooks into 'customize_register' (available as of WP 3.4) and allows
	 * you to add new sections and controls to the Theme Customize screen.
	 *
	 * Note: To enable instant preview, we have to actually write a bit of custom
	 * javascript. See live_preview() for more.
	 *
	 * @see add_action('customize_register',$func)
	 */
	public function thetheme_customize_register( $wp_customize ) {

		// Add Custom Panel to Live Customizer for Theme Options
		$wp_customize->add_panel(
			'the_theme_panel',
			array(
				'title'       => esc_html__( 'Theme Options', 'customizer' ),
				'description' => esc_html__( 'All the Theme Options', 'customizer' ),
				'priority'    => 10,
			)
		);

		//Contact info
		$wp_customize->add_section(
			'theme_section_contact',
			array(
				'title' => esc_html__( 'Contact Info', 'customizer' ),
				'panel' => 'the_theme_panel',
			)
		);

		// address
		$wp_customize->add_setting(
			'theme_contact',
			array(
				'default'           => ( '
				<span class="str">Pujades, 102</span>
				<span class="str">08005 Barcelona, Spain</span>
				<span class="str">T. <a href="tel:933209520">933 20 95 20</a></span>
				<span class="str"><a href="tel:933454322">933 45 43 22</a></span>
				<span class="str"><a href="mailto:info@ddmp.net">info@ddmp.net</a></span>
			' ),
				'sanitize_callback' => 'custom_sanitize_textarea',
			)
		);

		$wp_customize->add_control(
			'theme_contact',
			array(
				'type'        => 'textarea',
				'label'       => esc_html__( 'Contact Info:', 'customizer' ),
				'description' => esc_html__( 'Contact Info:', 'customizer' ),
				'section'     => 'theme_section_contact',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'theme_contact',
			array(
				'selector' => '.c-contact-info',
			)
		);

		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	public static function the_themecustomize_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

}

TheTheme_Customizer::the_themecustomize_instance();


/**
 * Adds sanitization callback function: select
 */
if ( ! function_exists( 'custom_sanitize_select' ) ) {
	function custom_sanitize_select( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );
		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;
		// If the input is a valid key, return it;
		// otherwise, return the default
		return array_key_exists( $input, $choices ) ? $input : $setting->default;
	}
}

if ( ! function_exists( 'custom_sanitize_textarea' ) ) {
	function custom_sanitize_textarea( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
}

if ( ! function_exists( 'themeslug_sanitize_dropdown_pages' ) ) {
	function themeslug_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );

		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
	}
}
