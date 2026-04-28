<?php
/**
 * Plugin Name: AARDEX Components
 * Description: Adds custom functionalities for the AARDEX Website
 * Version: 1.0.0
 * Author: Tonny Santana
 * Text Domain: aardex
 *
 * @package AARDEX
 */

require 'src/mega-menu/index.php';

add_action(
	'wp_enqueue_scripts',
	function () {

		wp_enqueue_style(
			'aardex_components_styles',
			plugin_dir_url( __FILE__ ) . 'src/mega-menu/style.css',
			array(),
			filemtime( plugin_dir_path( __FILE__ ) . 'src/mega-menu/style.css' )
		);

		wp_enqueue_style(
			'aardex_lato_font',
			'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap',
			array(),
			mt_rand(0,10000000000)
		);
	}
);
