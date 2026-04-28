<?php
/**
 * Main file of the megamenu.
 *
 * @package AARDEX
 */

use AARDEX\MegaMenuComponent;

require 'MegaMenuComponent.php';

add_shortcode(
	'mega_menu',
	function () {

		$menu_items = array(

			array(
				'label'       => 'Solutions',
				'type'        => 'first_level',
				'inner_items' => array(
					array(
						'label'          => 'Panel 1',
						'type'           => 'pannel',
						'see_all_button' => array(
							'label' => 'See all solutions',
							'link'  => 'https://site.com',
						),
					),
				),
			),
			array(
				'label' => 'Therapeutic Areas',
				'type'  => 'first_level',
			),
			array(
				'label' => 'Resources',
				'type'  => 'first_level',
			),
			array(
				'label' => 'About',
				'type'  => 'first_level',
			),
			array(
				'label' => 'Contact',
				'type'  => 'first_level',
			),
		);

		$mega_menu = new MegaMenuComponent();

		ob_start(); ?>

		<div class="aardex-mega-menu--first_level-wrapper">
			<div class="aardex-mega-menu">
				
				<ul>
					<?php

					// Ignoring the phpcs notice because the escaping
					// is being applied within the template.
                    echo $mega_menu->render_menu_items( $menu_items ); //phpcs:ignore

					?>
					 
				</ul>
					
			</div>
		</div>

		<?php

		return ob_get_clean();
	}
);


add_action(
	'wp_enqueue_scripts',
	function () {

		wp_enqueue_style(
			'aardex_components_styles',
			AARDEX_COMPONENTS_PLUGIN_URL . 'src/assets/style.css',
			array(),
			filemtime( AARDEX_COMPONENTS_PLUGIN_DIR . 'src/assets/style.css' )
		);

		wp_enqueue_style(
			'aardex_lato_font',
			// TODO: remove later.
			'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', //phpcs:ignore 
			array(),
			wp_rand( 0, 10000000000 )
		);
	}
);
