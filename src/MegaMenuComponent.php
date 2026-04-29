<?php
/**
 * Mega Menu Component Class
 *
 * @package AARDREX
 */

namespace AARDEX;

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
	 * @param array $args Array with the item arguments.
	 */
	public function render_menu_item( $args ) {

		$output = '';

		switch ( $args['type'] ) {

			case 'first_level':
				$output = $this->first_level_template( $args );
				break;

			case 'pannel':
				$output = $this->pannel_template( $args );
				break;
		}

		return $output;
	}

	/**
	 * Render the first level template
	 *
	 * @param array $args Array with the item arguments.
	 */
	public function first_level_template( $args ) {
		ob_start();

		// Stores the HTML element for each inner item.
		$rendered_inner_items = '';

		if ( isset( $args['inner_items'] ) && is_array( $args['inner_items'] ) ) {

			foreach ( $args['inner_items']  as $inner_item ) {
				$rendered_inner_items .= $this->render_menu_item( $inner_item );
			}
		}

		require AARDEX_COMPONENTS_PLUGIN_DIR . '/src/components/li-first-level/index.php';
		return ob_get_clean();
	}

	/**
	 * Render the inner page template
	 *
	 * @param array $args Array with the list item arguments.
	 */
	public function pannel_template( $args ) { //phpcs:ignore

		ob_start();
		require AARDEX_COMPONENTS_PLUGIN_DIR . '/src/components/pannel/index.php';
		return ob_get_clean();
	}
}
