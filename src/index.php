<?php
/**
 * Main file of the megamenu.
 *
 * @package AARDEX
 */

add_shortcode(
	'mega_menu',
	function () {

		$menu_items = array(

			array(
				'label'     => 'Solutions',
				'item_type' => 'inner_page',
				'template'  => 'first_level',
				'children'  => array(

					array(
						'label'     => 'Technology',
						'item_type' => 'taxonomy_group',
						'children'  => array(

							array(
								'label'     => 'MEMS Hardware Ecosystem',
								'item_type' => 'inner_page',
								'template'  => 'second_level',
								'children'  => array(

									array(
										'label'     => 'Mems© Caps',
										'item_type' => 'link',
										'template'  => 'first_level',
										'url'       => 'www.site.com',
									),

								),
							),
						),
					),
				),
			),
			array(
				'label'     => 'Therapeutic Areas',
				'template'  => 'first_level',
				'item_type' => 'link',
				'url'       => 'www.site.com',
			),
		);

		ob_start(); ?>

		<div class="aardex-mobile-menu--first_level-wrapper">
			<div class="aardex-mobile-menu">

				<ul>
					<li class="aardex-mobile-menu--first_level-item" data-aardex-menu-object-type="page">
						
						<button class="aardex-mobile-menu--first_level-button" >Solutions 
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 12L10 8L6 4" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</button>
						
						<div class="aardex-mobile-menu--inner-page" data-open="true" data-page-id="15" style="visibility: hidden; position:absolute">
							
							<button>Back</button>
							
							<ul>
								
								<li>
									
								</li>
									
							</ul>

						</div>
							
					</li>
					
					<li><?php echo Template::render_template( array( 'label' => 'Therapeutic Areas' ) ); ?></li>
					<li><?php echo Template::render_template( array( 'label' => 'Resources' ) ); ?></li>
					<li><?php echo Template::render_template( array( 'label' => 'About' ) ); ?></li>
					<li><?php echo Template::render_template( array( 'label' => 'Contact' ) ); ?></li>

				</ul>
					
			</div>
		</div>

		<?php

		return ob_get_clean();
	}
);

// TODO: Make the render function load the template dinamycally based on the array
class Template {

	public static function render_template( $args = array() ) {

		$label = $args['label'];

		require AARDEX_COMPONENTS_DIR . '/templates/first-level.php';
	}
}