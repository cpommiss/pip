<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * ACF Setup
 */
function set_acf_gmapi($api) {
    $api['key'] = 'AIzaSyD0DYqO37-xQ2d4Ec6-_XkRPD9ggZFiwxg';

    return $api;
}
add_filter('acf/fields/google_map/api', 'set_acf_gmapi');

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page();
}

/**
 * SiteOrigin Overrides
 */
function we_simple_masonry_template_file( $filename, $instance, $widget ) {
    $filename = get_stylesheet_directory() . '/widgets/siteorigin/simple-masonry/default.php';

    return $filename;
}
add_filter( 'siteorigin_widgets_template_file_sow-simple-masonry', 'we_simple_masonry_template_file', 10, 3 );

function we_extend_masonry_form( $form_options, $widget ){
    // Lets add a new theme option
    if( !empty($form_options['items']['fields']) ) {
        $form_options['items']['fields']['download'] = array(
            'type' => 'media',
            'label' => __( 'Choose a download file', 'widget-form-fields-text-domain' ),
            'choose' => __( 'Choose download file', 'widget-form-fields-text-domain' ),
            'update' => __( 'Set download file', 'widget-form-fields-text-domain' ),
            'library' => 'file',
            'fallback' => true
        );
    }

    return $form_options;
}
add_filter('siteorigin_widgets_form_options_sow-simple-masonry', 'we_extend_masonry_form', 10, 2);
