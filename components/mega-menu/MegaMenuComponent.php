<?php
/**
 * Mega Menu Component Class
 *
 * @package AARDREX
 */

namespace AARDEX;

require __DIR__ . '/components/li-first-level/ListItemFirstLevel.php';
require __DIR__ . '/components/list-item-group/ListItemGroup.php';
require __DIR__ . '/components/pannel/Pannel.php';
require __DIR__ . '/components/mobile-header/MobileHeader.php';
use ListItemFirstLevel;
use ListItemGroup;
use MobileHeader;
use Pannel;

/**
 * Class that handle the rendering of the entire component.
 *
 * @author Tonny Santana
 */
class MegaMenuComponent {

	/**
	 * Render the mega menu component
	 *
	 * @param array $menu_items Array with the menu items options.
	 */
	public function render( $menu_items ) {

		// This wrapper its used to set the height and position of the menu, nothing else.
		$output = '<div class="aardex-mega-menu--wrapper">';

		$output .= ( new MobileHeader() )->render();

		$output .= '<ul class="aardex-mega-menu">';

		foreach ( $menu_items as $item ) {
			$output .= $this->render_menu_item( $item );
		}

		$output .= '</ul>';
		$output .= '</div>';

		return $output;
	}

	/**
	 * Render the menu item
	 *
	 * @param array $args Array with the item arguments.
	 */
	public function render_menu_item( $args ) {

		$output = '';

		$rendered_inner_items = '';

		if ( isset( $args['inner_items'] ) ) {
			foreach ( $args['inner_items'] as $inner_item_args ) {
				$rendered_inner_items .= $this->render_menu_item( $inner_item_args );
			}
		}

		switch ( $args['type'] ) {

			case 'first_level':
				$output = ( new ListItemFirstLevel() )->render( $args, $rendered_inner_items );
				break;

			case 'pannel':
				$output = ( new Pannel() )->render( $args, $rendered_inner_items );
				break;

			case 'list_item_group':
				$output = ( new ListItemGroup() )->render( $args, $rendered_inner_items );
				break;
		}

		return $output;
	}
}
