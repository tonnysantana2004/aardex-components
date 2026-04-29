<?php
/**
 * List Item Group Template
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
class ListItemGroup {

	/**
	 * Render the component
	 *
	 * @param array  $args Array with the item arguments.
	 * @param string $inner_items String with the inner items rendered.
	 */
	public function render( $args, $inner_items ) {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--list_item_group">';

		// Content.
		$output .= '<ul class="aardex-mega-menu--children">';

		// Button.
		$output .= '<li class="aardex-mega-menu--list_item_group_label">';

		$output .= $args['label'];

		$output .= '</li>';

		if ( ! empty( $inner_items ) ) {

			$output .= $inner_items;

		}

		$output .= '</ul>';
		$output .= '</li>';

		return $output;
	}
}
