<?php
/**
 * Second Level Button Template
 *
 * @package AARDEX
 */

namespace AARDEX\Components\MegaMenu;

/**
 * Class for the component
 */
class SecondLevelItem {

	/**
	 * Label for the menu item
	 *
	 * @var string
	 */
	public string $label;

	/**
	 * Pannel Object
	 *
	 * @var Pannel
	 */
	public ?Pannel $pannel = null;

	/**
	 * Make Function
	 *
	 * @param string $label String with the item name.
	 */
	public static function make( $label ) {
		$instance        = new self();
		$instance->label = $label;

		return $instance;
	}

	/**
	 * Add the inner pannel.
	 *
	 * @param object $pannel Pannel Object.
	 */
	public function add_pannel( $pannel ) {
		$this->pannel = $pannel;
	}

	/**
	 * Render the second level template
	 */
	public function render() {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--second_level">';

		// Button.
		$output .= '<button class="aardex-mega-menu--second_level_button" >';

		// Icon.
		// Ignoring because I am not fetching any remote file.
		$output .= '<span class="aardex-mega-menu--second_level_icon">' . file_get_contents( AARDEX_COMPONENTS_PLUGIN_DIR . 'assets/components/mega-menu/svg/icon.svg' ) . '</span>'; //phpcs:ignore

		$output .= $this->label;

		// chevron.
		// Ignoring because I am not fetching any data from remote, but using it locally.
		$output .= file_get_contents( AARDEX_COMPONENTS_PLUGIN_DIR . 'assets/components/mega-menu/svg/chevron.svg' ); //phpcs:ignore

		$output .= '</button>';

		if ( $this->pannel !== null ) {

			$output .= '<ul class="aardex-mega-menu--children">';
			$output .= $this->pannel->render();
			$output .= '</ul>';
		}

		$output .= '</li>';

		return $output;
	}
}
