<?php
/**
 * Pannel Template
 *
 * @param array $args Array with the template variables.
 * @param array $rendered_inner_items Array with the template variables.
 *
 * @package AARDEX
 */

// When clicking the back button just remove the class "open";
// The id needs to be passed from the class.

/**
 * Class for the component
 */
class Pannel {

	/**
	 * Render the component
	 *
	 * @param array  $args Array with the item arguments.
	 * @param string $inner_items String with the inner items rendered.
	 */
	public function render( $args, $inner_items ) {

		ob_start();

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--pannel" id="unique123">';

		// Button.
		$output .= '<button class="aardex-mega-menu--pannel_back_button" data-aardex-panel-id="unique123">';

		// Icon.
		// Ignoring because I am not fetching any data from remote, but using it locally.
		$output .= file_get_contents( __DIR__ . '/icon.svg' ); //phpcs:ignore

		$output .= 'Back';

		$output .= '</button>';

		// Content.
		$output .= '<ul class="aardex-mega-menu--children aardex-mega-menu--pannel-content">';

		if ( isset( $args['see_all_button'] ) ) {

			$output .= '<li>';
			$output .= '<a href="' . $args['see_all_button']['link'] . '" class="aardex-mega-menu--pannel_see_all">';
			$output .= $args['see_all_button']['label'];
			$output .= '</a>';
			$output .= '</li>';
		}

		if ( empty( $inner_items ) ) {
			$output .= $inner_items;
		}

		$output .= '</ul>';
		$output .= '</li>';

		return $output;
	}
}
