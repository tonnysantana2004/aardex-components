<?php
/**
 * Third Level Button Template
 *
 * @param array $args Array with the template variables.
 * @param array $rendered_inner_items Array with the template variables.
 *
 * @package AARDEX
 */

namespace AARDEX\Components\MegaMenu;

/**
 * Class for the component
 */
class ThirdLevelItem {
	/**
	 * Label for the menu item
	 *
	 * @var string
	 */
	public string $label;

	/**
	 * Pannel Object
	 *
	 * @var object
	 */
	public object $pannel;

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
	 * Render the third level template
	 */
	public function render() {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--third_level">';

		// Button.
		$output .= '<button class="aardex-mega-menu--third_level_button" >';

		// Chevron.
		// Ignoring because I am not fetching any data from remote, but using it locally.
		$output .= file_get_contents( __DIR__ . '/icon.svg' ); //phpcs:ignore

		$output .= $this->label;

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
