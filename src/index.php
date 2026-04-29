<?php
/**
 * Main file of the megamenu.
 *
 * @package AARDEX
 */

use AARDEX\Components\MegaMenu\FirstLevelItem;
use AARDEX\Components\MegaMenu\ItemsGroup;
use AARDEX\Components\MegaMenu\MegaMenuComponent;
use AARDEX\Components\MegaMenu\Pannel;
use AARDEX\Components\MegaMenu\SecondLevelItem;
use AARDEX\Components\MegaMenu\ThirdLevelItem;

// TODO: Use a class to handle the components.
add_shortcode(
	'mega_menu',
	function () {

		$menu = MegaMenuComponent::make()
        ->add_items([
        FirstLevelItem::make('Solutions')
        ->add_pannel(
            Pannel::make([
                'label' => 'Panel for solutions',
                'see_all_button' => [
                    'label' => 'See all solutions',
                    'link'  => 'https://site.com',
                ],
            ])
            ->add_items([
                ItemsGroup::make('Technology')
                    ->add_items([
                        SecondLevelItem::make('MEMS Hardware Ecosystem')
                            ->add_pannel(
                                Pannel::make([
                                    'label' => 'Panel for MEMS Hardware',
                                    'see_all_button' => [
                                        'label' => 'See all MEMS Hardware Ecosystem',
                                        'link'  => 'https://site.com',
                                    ],
                                ])
                                ->add_items([
                                    ThirdLevelItem::make('Mems© Caps'),
                                    ThirdLevelItem::make('CleverCap Lite®'),
                                    ThirdLevelItem::make('Cerepak®'),
                                    ThirdLevelItem::make('MEMS® HH'),
                                    ThirdLevelItem::make('Injectapak®'),
                                    ThirdLevelItem::make('Medose'),
                                ])
                            ),

                        SecondLevelItem::make('MEMS Adherence Software'),
                        SecondLevelItem::make('MEMS Mobile'),
                        SecondLevelItem::make('MEMS Intelligence'),
                    ])
            ])
        ),
        FirstLevelItem::make('Therapeutic Areas'),
        FirstLevelItem::make('Resources'),
        FirstLevelItem::make('About'),
        FirstLevelItem::make('Contact'),
        ]);

		return $menu->render();
	}
);


add_action(
	'wp_enqueue_scripts',
	function () {

		wp_enqueue_style(
			'aardex_components_styles',
			AARDEX_COMPONENTS_PLUGIN_URL . 'assets/components/mega-menu/css/style.css',
			array(),
			filemtime( AARDEX_COMPONENTS_PLUGIN_DIR . 'assets/components/mega-menu/css/style.css' )
		);

        wp_enqueue_script(
			'aardex_components_script',
			AARDEX_COMPONENTS_PLUGIN_URL . 'assets/components/mega-menu/js/script.js',
			array(),
			filemtime( AARDEX_COMPONENTS_PLUGIN_DIR . 'assets/components/mega-menu/js/script.js' ),
            true
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
