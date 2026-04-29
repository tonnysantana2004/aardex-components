<?php
/**
 * First Level Button Template
 *
 * @param array $args Array with the template variables.
 * @param array $rendered_inner_items Array with the template variables.
 *
 * @package AARDEX
 */

/**
 * Class for the component
 */
class ListItemFirstLevel {

	/**
	 * Render the first level template
	 *
	 * @param array  $args Array with the item arguments.
	 * @param string $inner_items String with the inner items rendered.
	 */
	public function render( $args, $inner_items ) {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--first_level">';

		// Button.
		$output .= '<button class="aardex-mega-menu--first_level_button" >';
		$output .= $args['label'];

		// Icon.
		// Ignoring because I am not fetching any data from remote, but using it locally.
		$output .= file_get_contents( __DIR__ . '/icon.svg' ); //phpcs:ignore

		$output .= '</button>';

		if ( ! empty( $inner_items ) ) {

			$output .= '<ul class="aardex-mega-menu--children">';
			$output .= $inner_items;
			$output .= '</ul>';
		}

		$output .= '</li>';

		return $output;
	}
}
