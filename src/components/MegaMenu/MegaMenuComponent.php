<?php
/**
 * Mega Menu Component Class
 *
 * @package AARDREX
 */

namespace AARDEX\Components\MegaMenu;

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
	 * @var FirstLevelItem[]
	 */
	public array $first_level_items = array();

	/**
	 * Make Class.
	 */
	public static function make(): MegaMenuComponent {
		$instance = new self();
		return $instance;
	}

	/**
	 * Add new items to the menu.
	 *
	 * @param FirstLevelItem[] $new_items Array with list items.
	 */
	public function add_items( $new_items ) {
		$this->first_level_items = $new_items;
		return $this;
	}

	/**
	 * Render the mega menu component
	 */
	public function render(): string {

        $output = '<div class="aardex-mega-menu-main-wrapper">';

        // Place the hamburger toggle outside of the wrapper so it isn't part of the off-canvas
		$output .= '<button class="aardex-mega-menu--toggle-button" aria-label="Open menu" type="button">';
		
        $output .= '<svg width="19" height="11" viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.09998 5.1H17.1M1.09998 1.1H17.1M1.09998 9.1H17.1" stroke="white" stroke-width="2.2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>';
        
		$output .= '</button>';
        
        
		// This wrapper its used to set the height and position of the menu, nothing else.
		$output .= '<nav class="aardex-mega-menu--wrapper">';
        
		$output .= MobileHeader::render();
        
		$output .= '<ul class="aardex-mega-menu--items">';
        
		foreach ( $this->first_level_items as $item ) {
            $output .= $item?->render();
            }
            
            $output .= '</ul>';
            $output .= '</nav>';
        
        $output .= '</div>';

		return $output;
	}
}
