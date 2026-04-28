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

define( 'AARDEX_COMPONENTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AARDEX_COMPONENTS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require 'src/index.php';
