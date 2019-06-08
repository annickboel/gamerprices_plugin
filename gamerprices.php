<?php
/*
 * Plugin Name: GamerPrices1
 * Plugin URI: https://www.gamerprices.fr
 * Description: Adds shortcode which enables you to output Gamerprices box anywhere you like.
 * Version: 1.0
 * Author: GamerPrices
 * Text Domain: gamerprices
 * Domain Path : /languages
 */
if (! function_exists ( 'add_action' )) {
	exit ();
}

define ( 'GAMERPRICES_VERSION', '1.0' );
define ( 'GAMERPRICES__MINIMUM_WP_VERSION', '4.0' );
define ( 'GAMERPRICES__PLUGIN_URL', plugin_dir_url ( __FILE__ ) );
define ( 'GAMERPRICES__PLUGIN_DIR', plugin_dir_path ( __FILE__ ) );

require_once (GAMERPRICES__PLUGIN_DIR . 'class-gp.php');
register_activation_hook ( __FILE__, array (
	'GamerPrices',
	'plugin_activation' 
) );
register_deactivation_hook ( __FILE__, array (
	'GamerPrices',
	'plugin_deactivation' 
) );

// Bootstrap Shortcode feature
require_once (GAMERPRICES__PLUGIN_DIR . 'class-gp-game-box-shortcode.php');
add_action ( 'init', array (
	'GP_Game_Box_Shortcode',
	'init'
));
require_once (GAMERPRICES__PLUGIN_DIR . 'class-gp-product-box-shortcode.php');
add_action ( 'init', array (
	'GP_Product_Box_Shortcode',
	'init'
));

