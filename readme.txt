=== Gameprices ===
Contributors: bessel
Plugin Name: Gameprices
Tags: shortcode, theme, admin, gamerprices, game, comparator
Author: Gamerprices
Author URI: https://www.gamerprices.fr/
Requires at least: 4.0
Tested up to: 5.1.1
Stable tag: 1.0
License: GNU General Public License v2

This plugin allows to add Gameprices Product Compare box and Gamerprices Game Compare box anywhere you like in your site

== Description ==

This plugin allows to add Gameprices Product Compare box and Gamerprices Game Compare box anywhere you like in your site,
using shortcodes. Two shortcodes are available : [gp_product_box] and [gp_game_box].

= Special Features =

1. Gameprices [gp_product_box] shortcode.
2. Gameprices [gp_game_box] shortcode.

PS: You'll need to be registered  on the Gameprices site (https://www.gamerprices.fr/) to get products and games attributes.

* Gameprices [gp_product_box] shortcode.
    * <code>[gp_product_box ean="eancode"]</code>
	    * Mandatory parameter:
	     	 * <strong>ean</strong>: The product ean code
	    * Additional Parameters:
			* <strong>width</strong>: The Gamerprices box iframe width attribute, default: <code>100%</code>
			* <strong>height</strong>: The Gamerprices box iframe height attribute, default: <code>300</code>
			* <strong>scrolling</strong>: The Gamerprices box iframe scrolling attribute, default: <code>auto</code>

* Gameprices [gp_game_box] shortcode.
    * <code>[gp_game_box gameid="gameid"]</code>
    	* Mandatory parameter:
    		* <strong>gameid</strong>: The game id
	    * Additional Parameters:
	     	* <strong>platform</strong>: The game platform
	        * <strong>editionid</strong>: The game edition id
			* <strong>width</strong>: The Gamerprices box iframe width attribute, default: <code>100%</code>
			* <strong>height</strong>: The Gamerprices box iframe height attribute, default: <code>300</code>
			* <strong>scrolling</strong>: The Gamerprices box iframe scrolling attribute, default: <code>auto</code>

= Feedback =
* For your suggestions and feedback, contact us at https://www.gamerprices.fr/contact
 
== Installation ==

1. Upload the whole plugin directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's it. Use the [gp_game_box] and [gp_product_box] shortcodes anywhere you want
4. Enjoy!

== Screenshots ==
1. [gp_product_box] and [gp_game_box] shortcodes example in edit mode
2. [gp_product_box] and [gp_game_box] shortcodes example in visualisation mode

== Changelog ==

= 1.0 =
	* [gp_game_box] and [gp_product_box] Shortcodes features added
	