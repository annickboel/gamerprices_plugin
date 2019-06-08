<?php
/**
 * Gameprices Game Compare Box Shortcode Feature
 *
 * This Shortcode calls Gameprices Api to recover the Game box HTML in an iframe.
 * Usage: 
 *		[gp_game_box gameid="41688" platform="xboxone" editionid="" width="100%" height="200" scrollng="auto"]
 * 		. gameid.   : Mandatory attribute. The game id.
 * 		. editionid : Optional attribute. The game edition id.
 * 		. platform  : Optional attribute. The game platform. Default value 'pc'
 * 		. width     : Optional attribute. The iframe width attribute. Default value '100%'
 *      . height    : Optional attribute. The iframe height attribute. Default value '200'
 *      . scrolling  : Optional attribute. The iframe scrolling attribute. Default value 'auto'
 *
 * @package    Gameprices
 * @author     Martin Besselievre <besselievre.martin@gmail.com>
 * @since      1.0
 */
class GP_Game_Box_Shortcode {
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
		add_shortcode( 'gp_game_box', array( 'GP_Game_Box_Shortcode', 'display_game_box' ));
	}


	/**
     * Control that the cover attribute is correct
     * @param att The attribute
     * @return string  The corrected value
     * @since    1.0
     */
	private static function check_cover_attribute($att) {
		$allowed_values=array('true','false');
		if (in_array($att, $allowed_values)) {
			return $att;
		}
		return 'true';
	}

	/**
     * Control that the platform attribute is correct
     * @param att The attribute
     * @return string  The corrected value
     * @since    1.0
     */
	private static function check_platform_attribute($att) {
		$allowed_values=GamerPrices::$platforms_available;
		if (in_array($att, $allowed_values)) {
			return $att;
		}
		return 'pc';
	}

	/**
     * Display the game box
     *
     * @since    1.0
     */
	public static function display_game_box($atts){
		// Merge the given Shortcode attributes with default values
		$a = shortcode_atts( array(
			'gameid' => '',
			'editionid' => '',
			'platform' => 'pc',
			'cover' => 'true',
			'width' => '100%',
			'height' => '200',
			'scrolling' => 'auto'
		), $atts );

		// Set variables from shortcodes attributes. Correct values if necessary
		$gameid=$a['gameid'];
		$editionid=$a['editionid'];
		$platform=GP_Game_Box_Shortcode::check_platform_attribute($a['platform']);
		$cover=GP_Game_Box_Shortcode::check_cover_attribute($a['cover']);
		$scrolling=$a['scrolling'];
		$width=$a['width'];
		$height=$a['height'];

		// Set iframe id
		$id='gp_product_box_'.$gameid.'_'.$platform;
		if (!empty($editionid)) {
			$id=$id.'_'.$editionid;
		}

		// Compute HTML API url
		$locale="fr_fr";
		$url="https://api.gamerprices.com/compare/xboxygen?";
		$url=$url."locale=".$locale;
		$url=$url."&platform=".$platform;
		$url=$url."&gameId=".$gameid;
		$url=$url."&cover=".$cover;
		if (!empty($editionid)) {
			$url=$url."&editionId=".$editionid;
		}

		// Render Game Box inside an iframe only if the gameId is provided
		ob_start();
		if (!empty($gameid)) { 
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