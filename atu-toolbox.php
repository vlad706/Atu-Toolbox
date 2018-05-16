<?php

/**
 *
 * @link              http://athemes.com
 * @since             1.0
 * @package           Atu_Toolbox
 *
 * @wordpress-plugin
 * Plugin Name:       Atu Toolbox
 * Description:       Provides Elementor blocks and other enhancement for the Atu WordPress theme
 * Version:           1.0.0
 * Author:            aThemes
 * Author URI:        http://athemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       atu-toolbox
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Atu_Toolbox {

	private static $instance;

	/**
	 * Returns the instance.
	 */
	public static function get_instance() {
		if ( ! self::$instance )
			self::$instance = new self;
		return self::$instance;
	}

	/**
	 * Actions setup
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );		
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'block_category' ) );
	}	

	/**
	 * Constants
	 */
	function constants() {

		define( 'ATU_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
	}	

	/**
	 * Load the Elementor custom blocks
	 */	
	public function widgets_registered() {

		if ( defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base') ) {

			require ATU_DIR . '/blocks/block-iconbox-carousel.php';
			require ATU_DIR . '/blocks/block-testimonials.php';
			require ATU_DIR . '/blocks/block-pricing.php';
			require ATU_DIR . '/blocks/block-employee.php';
			require ATU_DIR . '/blocks/block-image-icon.php';
			require ATU_DIR . '/blocks/block-portfolio.php';
			require ATU_DIR . '/blocks/block-shop-categories.php';
			require ATU_DIR . '/blocks/block-blog.php';
		}
	}

	public function block_category() {
		\Elementor\Plugin::$instance->elements_manager->add_category( 
	   	'atu-elements',
	   	[
	   		'title' => __( 'Atu Elements', 'atu' ),
	   		'icon' => 'fa fa-plug',
	   	],
	   	1
		);		
	}
}

Atu_Toolbox::get_instance();