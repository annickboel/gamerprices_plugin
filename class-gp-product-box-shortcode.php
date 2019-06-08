<?php
/**
 * Gameprices Product Compare Box Shortcode Feature
 *
 * This Shortcode calls Gameprices Api to recover the Product box HTML in an iframe.
 * Usage: 
 *		[gp_product_box ean="0711719827757" width="100%" height="200" scrolling="auto"]
 * 		. ean attrbute is mandatory
 * 		. width     : Optional attribute. The iframe width attribute. Default value '100%'
 *      . height    : Optional attribute. The iframe height attribute. Default value '200'
 *      . scrolling  : Optional attribute. The iframe scrolling attribute. Default value 'auto'
 *
 *
 * @package    Gameprices
 * @author     Martin Besselievre <besselievre.martin@gmail.com>
 * @since      1.0
 */
class GP_Product_Box_Shortcode {
	private static $initiated = false;
	/**
     * Init the class
     *
     * @since    1.0
     */
	public static function init() {
		if (! self::$initiated) {
			self::init_hooks ();
		}
	}

 	/**
     * Register this class with the WordPress API
     *
     * @since    1.0
     */
	public static function init_hooks() {
		self::$initiated = true;
		add_shortcode( 'gp_product_box', array( 'GP_Product_Box_Shortcode', 'display_game_box' ));
	}

	/**
     * Display the game box
     *
     * @since    1.0
     */
	public static function display_game_box($atts){
		// Merge the given Shortcode attributes with default values
		$a = shortcode_atts( array(
			'ean' => '',
			'width' => '100%',
			'height' => '200',
			'scrolling' => 'auto'
		), $atts );

		// Set variables from shortcodes attributes
		$ean=$a['ean'];
		$width=$a['width'];
		$height=$a['height'];
		$scrolling=$a['scrolling'];

		// Set iframe id
		$id='gp_product_box_'.$ean;
		
		// Compute HTML API url
		$url="https://prod.api.gamerprices.com/compare/product/xboxygen?ean=".$ean;
		
		// Render Game Box inside an iframe only if the ean code is provided
		ob_start();
		if (!empty($ean)) { 
		?>
			<iframe id="<?php echo $id ?>"
	    		width="<?php echo $width ?>"
	    		height="<?php echo $height ?>"
	    		scrolling="<?php echo $scrolling ?>" 
	    		src="<?php echo $url ?>"
	    	>
			</iframe>
		<?php
		}
		return ob_get_clean();
	}
}