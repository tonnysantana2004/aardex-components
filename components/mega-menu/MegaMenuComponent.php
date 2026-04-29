<?php
/**
 * Mega Menu Component Class
 *
 * @package AARDREX
 */

namespace AARDEX;

require __DIR__ . '/components/li-first-level/ListItemFirstLevel.php';
require __DIR__ . '/components/mobile-header/MobileHeader.php';
use ListItemFirstLevel;
use MobileHeader;

// abrir pagina do menu menu (via id)
// Voltar pagina do menu (precisa herdar o id do menu pai)
// apenas um menu aberto por vez
// opção para link no item do menu
// se tiver inner items não carregar o link.

/**
 * Class that handle the component.
 *
 * @author Tonny Santana
 */
class MegaMenuComponent {


	/**
	 * Items of the menu
	 *
	 * @var ListItemFirstLevel[]
	 */
	public array $first_level_items;

	/**
	 * Add new items to the menu.
	 *
	 * @param ListItemFirstLevel[] $new_items Array with list items.
	 */
	public function add_items( $new_items ) {
		$this->first_level_items = $new_items;
	}

	/**
	 * Render the mega menu component
	 */
	public function render() {

		// This wrapper its used to set the height and position of the menu, nothing else.
		$output = '<div class="aardex-mega-menu--wrapper">';

		$output .= MobileHeader::render();

		$output .= '<ul class="aardex-mega-menu">';

		if ( $this->first_level_items !== null ) {

			foreach ( $this->first_level_items as $item ) {
				$output .= $item->render();

			}
		}

		$output .= '</ul>';
		$output .= '</div>';

		return $output;
	}
}
