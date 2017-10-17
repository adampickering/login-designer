<?php
/**
 * Customizer functionality
 *
 * @package   @@pkg.name
 * @author    @@pkg.author
 * @license   @@pkg.license
 * @version   @@pkg.version
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Login_Designer_Customizer' ) ) :

	/**
	 * Enqueues JS & CSS assets
	 */
	class Login_Designer_Customizer {

		/**
		 * The class constructor.
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customize_register' ), 11 );
		}

		/**
		 * Register Customizer Settings.
		 *
		 * @param WP_Customize_Manager $wp_customize the Customizer object.
		 */
		function customize_register( $wp_customize ) {

			/**
			 * Add custom controls.
			 */
			require_once LOGIN_DESIGNER_PLUGIN_DIR . 'includes/customize-controls/class-login-designer-range-control.php';
			require_once LOGIN_DESIGNER_PLUGIN_DIR . 'includes/customize-controls/class-login-designer-template-control.php';
			require_once LOGIN_DESIGNER_PLUGIN_DIR . 'includes/customize-controls/class-login-designer-title-control.php';
			require_once LOGIN_DESIGNER_PLUGIN_DIR . 'includes/customize-controls/class-login-designer-gallery-control.php';

			/**
			 * Add the main panel and sections.
			 */
			$wp_customize->add_panel( 'login_designer', array(
				'title'           => esc_html__( 'Login Designer', '@@textdomain' ),
				'priority'        => 150,
				'priority'        => 1,
			) );

			// Section.
			$wp_customize->add_section( 'login_designer__section--templates', array(
				'title'           => esc_html__( 'Templates', '@@textdomain' ),
				'panel'           => 'login_designer',
			) );

			// Section.
			$wp_customize->add_section( 'login_designer__section--styles', array(
				'title'           => esc_html__( 'Style Editor', '@@textdomain' ),
				'panel'           => 'login_designer',
			) );

			// Section.
			$wp_customize->add_section( 'login_designer__section--background', array(
				'title'           => esc_html__( 'Background', '@@textdomain' ),
				'panel'           => 'login_designer',
			) );

			// Section.
			$wp_customize->add_section( 'login_designer__section--settings', array(
				'title'           => esc_html__( 'Settings', '@@textdomain' ),
				'panel'           => 'login_designer',
			) );

			/**
			 * Add sections.
			 */
			require_once LOGIN_DESIGNER_PLUGIN_DIR . 'includes/customize-sections/templates.php';
			require_once LOGIN_DESIGNER_PLUGIN_DIR . 'includes/customize-sections/style-editor.php';
		}

		/**
		 * Sanitize Checkbox.
		 *
		 * @param string|bool $checked Customizer option.
		 */
		public function sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true === $checked ) ? true : false );
		}

		/**
		 * Returns an array of theme layout choices registered for @@pkg.name.
		 *
		 * @return array of theme skins.
		 */
		function get_choices( $choices ) {
			$layouts = $choices;
			$layouts_control_options = array();

			foreach ( $layouts as $layout => $value ) {
				$layouts_control_options[ $layout ] = $value['image'];
			}

			return $layouts_control_options;
		}

		/**
		 * Register header layouts.
		 */
		function get_templates() {

			$image_dir  = LOGIN_DESIGNER_PLUGIN_URL . 'assets/images/';

			return apply_filters( 'login_designer_templates', array(
				'default' => array(
					'title' => esc_html__( 'Default', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . 'template-01/template-01.svg',
				),
				'01' => array(
					'title' => esc_html__( 'Template 01', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . 'template-01/template-01.svg',
				),
				'02' => array(
					'title' => esc_html__( 'Template 02', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . 'template-01/template-01.svg',
				),
			) );
		}

		/**
		 * Register header layouts.
		 */
		function get_background_images() {

			$image_dir  = LOGIN_DESIGNER_PLUGIN_URL . 'assets/images/backgrounds/';

			return apply_filters( 'login_designer_templates', array(
				'01' => array(
					'title' => esc_html__( '01', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . '01.jpg',
				),
				'02' => array(
					'title' => esc_html__( '02', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . '02.jpg',
				),
				'03' => array(
					'title' => esc_html__( '03', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . '03.jpg',
				),
				'04' => array(
					'title' => esc_html__( '04', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . '04.jpg',
				),
				'05' => array(
					'title' => esc_html__( '05', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . '05.jpg',
				),
				'06' => array(
					'title' => esc_html__( '06', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . '06.jpg',
				),
				'07' => array(
					'title' => esc_html__( '07', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . '07.jpg',
				),
				'08' => array(
					'title' => esc_html__( '08', '@@textdomain' ),
					'image' => esc_url( $image_dir ) . '08.jpg',
				),
			) );
		}

		/**
		 * Returns the background choices.
		 *
		 * @since 1.0.0
		 * @return array
		 */
		public static function get_background_choices() {

			$choices = array(
				'repeat' => array(
					'no-repeat' => __( 'No Repeat', '@@textdomain' ),
					'repeat'    => __( 'Tile', '@@textdomain' ),
					'repeat-x'  => __( 'Tile Horizontally', '@@textdomain' ),
					'repeat-y'  => __( 'Tile Vertically', '@@textdomain' ),
				),
				'size' => array(
					'auto'    => __( 'Default', '@@textdomain' ),
					'cover'   => __( 'Cover', '@@textdomain' ),
					'contain' => __( 'Contain', '@@textdomain' ),
				),
				'position' => array(
					'left-top'      => __( 'Left Top', '@@textdomain' ),
					'left-center'   => __( 'Left Center', '@@textdomain' ),
					'left-bottom'   => __( 'Left Bottom', '@@textdomain' ),
					'right-top'     => __( 'Right Top', '@@textdomain' ),
					'right-center'  => __( 'Right Center', '@@textdomain' ),
					'right-bottom'  => __( 'Right Bottom', '@@textdomain' ),
					'center-top'    => __( 'Center Top', '@@textdomain' ),
					'center-center' => __( 'Center Center', '@@textdomain' ),
					'center-bottom' => __( 'Center Bottom', '@@textdomain' ),
				),
				'attach' => array(
					'fixed'   => __( 'Fixed', '@@textdomain' ),
					'scroll'  => __( 'Scroll', '@@textdomain' ),
				),
			);

			return apply_filters( 'login_designer_background_choices', $choices );

		}

		/**
		 * Returns an array of Google Font options
		 *
		 * @return array of font styles.
		 */
		function get_fonts() {

			$fonts = array(
				'default' 		=> esc_html__( 'Default', '@@textdomain' ),
				'Abril Fatface'         => 'Abril Fatface',
				'georgia'               => 'Georgia',
				'helvetica'             => 'Helvetica',
				'Lato'                  => 'Lato',
				'Lora'                  => 'Lora',
				'Karla'                 => 'Karla',
				'Josefin Sans'          => 'Josefin Sans',
				'Montserrat'            => 'Montserrat',
				'Open Sans'             => 'Open Sans',
				'Oswald'                => 'Oswald',
				'Overpass'              => 'Overpass',
				'Poppins'               => 'Poppins',
				'PT Sans'               => 'PT Sans',
				'Roboto'                => 'Roboto',
				'Fira Sans Condensed'   => 'Fira Sans',
				'times'                 => 'Times New Roman',
				'Nunito'                => 'Nunito',
				'Merriweather'          => 'Merriweather',
				'Rubik'                 => 'Rubik',
				'Playfair Display'      => 'Playfair Display',
				'Spectral'              => 'Spectral',
			);

			return apply_filters( 'login_designer_fonts', $fonts );
		}
	}

endif;

new Login_Designer_Customizer();
