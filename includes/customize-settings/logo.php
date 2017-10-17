<?php
/**
 * Logo Customizer Section.
 *
 * @package   @@pkg.name
 * @copyright @@pkg.copyright
 * @author    @@pkg.author
 * @license   @@pkg.license
 */

/**
 * Settings.
 */
$wp_customize->add_setting( 'login_designer_title_logo', array(
	'sanitize_callback'     => 'sanitize_text_field',
) );

$wp_customize->add_control( new Login_Designer_Title_Control( $wp_customize, 'login_designer_title_logo', array(
	'type'                  => 'login-designer-title',
	'label'                 => esc_html__( 'Login Logo', '@@textdomain' ),
	'description'           => esc_html__( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet llam quis.', '@@textdomain' ),
	'section'               => 'login_designer__section--styles',
) ) );

$wp_customize->add_setting( 'login_designer_custom_logo', array(
	// 'transport'             => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'login_designer_custom_logo', array(
	'label'                => esc_html__( 'Upload Image', '@@textdomain' ),
	'section'              => 'login_designer__section--styles',
	'settings'             => 'login_designer_custom_logo',
) ) );


$wp_customize->add_setting( 'login_designer_custom_logo_margin_bottom', array(
	'default'               => '25',
	// 'transport'             => 'postMessage',
	'sanitize_callback'     => '',
) );

$wp_customize->add_control( new Login_Designer_Range_Control( $wp_customize, 'login_designer_custom_logo_margin_bottom', array(
	'type'                  => 'login-designer-range',
	'label'                 => esc_html__( 'Bottom Spacing', '@@textdomain' ),
	'section'               => 'login_designer__section--styles',
	'description'           => 'px',
	'default'               => '25',
	'input_attrs'           => array(
		'min'               => 0,
		'max'               => 100,
		'step'              => 1,
		),
	)
) );