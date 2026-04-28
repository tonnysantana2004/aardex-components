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
				'label'       => 'Solutions',
				'type'        => 'first_level',
				'inner_items' => array(
					array(
						'label' => 'Panel 1',
						'type'  => 'pannel',
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

/**
 * Mega Menu Component Class
 */
class MegaMenuComponent {

	/**
	 * Render the mega menu items
	 *
	 * @param array $menu_items Array with the first level items.
	 */
	public function render_menu_items( $menu_items ): string {

		$output = '';

		foreach ( $menu_items as $item ) {
			$output .= $this->render_menu_item( $item );
		}

		return $output;
	}

	/**
	 * Render the menu item
	 *
	 * @param array $item_args Array with the list item arguments.
	 */
	public function render_menu_item( $item_args ) {

		$output = '';

		switch ( $item_args['type'] ) {

			case 'first_level':
				$output = $this->first_level_template( $item_args );
				break;

			case 'pannel':
				$output = $this->pannel_template( $item_args );
				break;
		}

		return $output;
	}

	/**
	 * Render the first level template
	 *
	 * @param array $item_args Array with the list item arguments.
	 */
	public function first_level_template( $item_args ) {
		ob_start();

		// Stores the HTML element for each inner item.
		$rendered_inner_items = '';

		if ( isset( $item_args['inner_items'] ) && is_array( $item_args['inner_items'] ) ) {

			foreach ( $item_args['inner_items'] as $inner_item ) {
				$rendered_inner_items .= $this->render_menu_item( $inner_item );
			}
		}

		require AARDEX_COMPONENTS_DIR . '/templates/li-first-level.php';
		return ob_get_clean();
	}

	/**
	 * Render the inner page template
	 *
	 * @param array $item_args Array with the list item arguments.
	 */
	public function pannel_template( $item_args ) {

		ob_start();
		require AARDEX_COMPONENTS_DIR . '/templates/pannel.php';
		return ob_get_clean();
	}
}