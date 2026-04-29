<?php
/**
 * Second Level Button Template
 *
 * @package AARDEX
 */

/**
 * Class for the component
 */
class ListItemSecondLevel {

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
	 * Render the second level template
	 */
	public function render() {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--second_level">';

		// Button.
		$output .= '<button class="aardex-mega-menu--second_level_button" >';

		// Icon.
		// Ignoring because I am not fetching any remote file.
		$output .= '<span class="aardex-mega-menu--second_level_icon">' . file_get_contents( __DIR__ . '/icon.svg' ) . '</span>'; //phpcs:ignore

		$output .= $this->args['label'];

		// Chevron.
		// Ignoring because I am not fetching any remote file.
		$output .= file_get_contents( __DIR__ . '/icon.svg' ); //phpcs:ignore

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
