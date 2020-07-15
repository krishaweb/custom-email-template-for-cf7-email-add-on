<?php
// Define add on path.
if ( ! defined( 'CF7_EMAIL_ADDON_PATH' ) ) {
	define( 'CF7_EMAIL_ADDON_PATH', get_template_directory() . '/custom-email-template' );
}

// Define add on URL.
if ( ! defined( 'CF7_EMAIL_ADDON_URL' ) ) {
	define( 'CF7_EMAIL_ADDON_URL', get_template_directory_uri() . '/custom-email-template/' );
}

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
			'preview_image' => get_template_directory_uri() . '/custom-email-template/assets/images/user-preview.jpg',
		),
	);
	$templates['user_templates'] = array_merge( $user_templates, $templates['user_templates'] );

	// Admin templates.
	$admin_templates = array(
		array(
			'name' => __( 'Demo Default', 'custom-template-cf7-email-add-on' ),
			'slug' => 'demo-default',
			'preview_image' => get_template_directory_uri() . '/custom-email-template/assets/images/admin-preview.jpg',
		),
	);
	$templates['admin_templates'] = array_merge( $admin_templates, $templates['admin_templates'] );
	return $templates;
}
add_filter( 'cf7_email_templates', 'cs_cf7_add_templates' );
