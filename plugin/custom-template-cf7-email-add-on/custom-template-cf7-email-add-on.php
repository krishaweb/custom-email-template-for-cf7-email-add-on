<?php
/**
 * Plugin Name: Custom Email Template For CF7 Email Add on
 * Plugin URI: https://github.com/pandya-parth/custom-email-template-for-cf7-email-add-on/tree/master/plugin/custom-template-cf7-email-add-on
 * Description: Contact Form 7 Email Add on plugin provides the responsive Email templates to admin and users.
 * Version: 1.0
 * Author: KrishaWeb
 * Author URI: https://www.krishaweb.com
 * Text Domain: custom-template-cf7-email-add-on
 * Domain Path: /languages
 */

// If check wordpress install or not.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define add on path.
if ( ! defined( 'CF7_EMAIL_ADDON_PATH' ) ) {
	define( 'CF7_EMAIL_ADDON_PATH', plugin_dir_path( __FILE__ ) );
}

// Define add on URL.
if ( ! defined( 'CF7_EMAIL_ADDON_URL' ) ) {
	define( 'CF7_EMAIL_ADDON_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * Plugin activate hook.
 */
function cs_cf7_email_add_on_activate() {
	// If check contact form 7 activate or not.
	if ( ! class_exists( 'CF7_PRO_Email_Add_on' ) ) {
		// Deactivate contact form 7 plguin.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		// Display error message.
		wp_die( __( 'Please activate Contact Form 7 Email Add On Pro.', 'custom-template-cf7-email-add-on' ), 'Plugin dependency check',
			array(
				'back_link' => true,
			)
		);
	}
}
register_activation_hook( __FILE__, 'cs_cf7_email_add_on_activate' );

/**
 * Plugin deactivate hook.
 */
function cs_cf7_email_add_on_deactivate() {
	// Code here.
}
register_deactivation_hook( __FILE__, 'cs_cf7_email_add_on_deactivate' );

/**
 * Plugin uninstall hook.
 */
function cs_cf7_email_add_on_uninstall() {
	// Code here.
}
register_uninstall_hook( __FILE__, 'cs_cf7_email_add_on_uninstall' );

/**
 * Loads a cf 7 email add on textdomain.
 */
function cs_cf7() {
	load_plugin_textdomain( 'custom-template-cf7-email-add-on', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'cs_cf7' );

/**
 * Add custom email template.
 *
 * @param array $templates Email templates.
 * @return array
 */
function cs_cf7_add_templates( $templates ) {
	// User templates.
	$user_templates = array(
		array(
			'name' => __( 'Demo Default', 'custom-template-cf7-email-add-on' ),
			'slug' => 'demo-default',
			'preview_image' => plugin_dir_url( __FILE__ ) . 'assets/images/user-preview.jpg',
		),
	);
	$templates['user_templates'] = array_merge( $user_templates, $templates['user_templates'] );

	// Admin templates.
	$admin_templates = array(
		array(
			'name' => __( 'Demo Default', 'custom-template-cf7-email-add-on' ),
			'slug' => 'demo-default',
			'preview_image' => plugin_dir_url( __FILE__ ) . 'assets/images/admin-preview.jpg',
		),
	);
	$templates['admin_templates'] = array_merge( $admin_templates, $templates['admin_templates'] );
	return $templates;
}
add_filter( 'cf7_email_templates', 'cs_cf7_add_templates' );
