<?php
/**
 * Main file of the megamenu.
 *
 * @package AARDEX
 */

use AARDEX\MegaMenuComponent;

require AARDEX_COMPONENTS_PLUGIN_DIR . '/components/mega-menu/MegaMenuComponent.php';


// TODO: Use a class to handle the components.
add_shortcode(
	'mega_menu',
	function () {

		$menu_items = array(

			array(
				'label'       => 'Solutions',
				'type'        => 'first_level',
				'pannel' => array(
						'label'          => 'Panel for solutions',
						'type'           => 'pannel',
						'see_all_button' => array(
							'label' => 'See all solutions',
							'link'  => 'https://site.com',
						),
                        'inner_items' => array(
                            array(
                                'label' => 'Technology',
                                'type'  => 'list_item_group',
                                'inner_items' => array(
                                    array(
                                        'label' => 'MEMS Hardware Ecosystem ',
                                        'type'  => 'second_level',
                                        'inner_items' => array(
                                            array(
                                                'label'          => 'Panel for MEMS Hardware',
                                                'type'           => 'pannel',
                                                'see_all_button' => array(
                                                    'label' => 'See all MEMS Hardware Ecosystem ',
                                                    'link'  => 'https://site.com',
                                                ),
                                                'inner_items' => array(
                                                    array(
                                                        'label' => 'Mems© Caps',
                                                        'type'  => 'third_level',
                                                    ),
                                                    array(
                                                        'label' => 'CleverCap Lite®',
                                                        'type'  => 'third_level',
                                                    ),
                                                    array(
                                                        'label' => 'Cerepak®',
                                                        'type'  => 'third_level',
                                                    ),
                                                    array(
                                                        'label' => 'MEMS® HH​',
                                                        'type'  => 'third_level',
                                                    ),
                                                    array(
                                                        'label' => 'Injectapak®',
                                                        'type'  => 'third_level',
                                                    ),
                                                    array(
                                                        'label' => 'Medose',
                                                        'type'  => 'third_level',
                                                    ),
                                                )
                                            )
                                        )
                                    ),
                                    array(
                                        'label' => 'MEMS Adherence Software ',
                                        'type'  => 'second_level',
                                    ),
                                    array(
                                        'label' => 'MEMS Mobile ',
                                        'type'  => 'second_level',
                                    ),
                                    array(
                                        'label' => 'MEMS Intelligence',
                                        'type'  => 'second_level',
                                    ),
                                )
                            ),
                        )
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
			)
		);

		$output = new MegaMenuComponent();

		return $output->render( $menu_items );
	}
);


add_action(
	'wp_enqueue_scripts',
	function () {

		wp_enqueue_style(
			'aardex_components_styles',
			AARDEX_COMPONENTS_PLUGIN_URL . '/components/mega-menu/style.css',
			array(),
			filemtime( AARDEX_COMPONENTS_PLUGIN_DIR . '/components/mega-menu/style.css' )
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
