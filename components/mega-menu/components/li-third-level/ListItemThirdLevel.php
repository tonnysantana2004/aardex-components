<?php
/**
 * Third Level Button Template
 *
 * @param array $args Array with the template variables.
 * @param array $rendered_inner_items Array with the template variables.
 *
 * @package AARDEX
 */

/**
 * Class for the component
 */
class ListItemThirdLevel {

	/**
	 * Arguments for the menu item
	 *
	 * @var array
	 */
	public array $args;

	/**
	 * Pannel Object
	 *
	 * @var object
	 */
	public object $pannel;

	/**
	 * Construct function
	 *
	 * @param array $args Array with the item arguments.
	 */
	public function __construct( $args ) {
		$this->args = $args;
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

		$output .= $this->args['label'];

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
