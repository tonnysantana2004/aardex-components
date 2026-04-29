<?php
/**
 * List Item Group Template
 *
 * @param array $args Array with the template variables.
 * @param array $rendered_inner_items Array with the template variables.
 *
 * @package AARDEX
 */

/**
 * Class for the component
 */
class ListItemGroup {

	/**
	 * Arguments for the menu item
	 *
	 * @var array
	 */
	public array $args;

	/**
	 * Inner Items objects array
	 *
	 * @var ListItemSecondLevel[]
	 */
	public array $inner_items;

	/**
	 * Construct function
	 *
	 * @param array $args Array with the item arguments.
	 */
	public function __construct( $args ) {
		$this->args = $args;
	}

	/**
	 * Add the inner items.
	 *
	 * @param ListItemSecondLevel[] $new_items Inner items objects array.
	 */
	public function add_items( $new_items ) {
		$this->inner_items = $new_items;
	}

	/**
	 * Render the component
	 */
	public function render() {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--list_item_group">';

		// Content.
		$output .= '<ul class="aardex-mega-menu--children">';

		// Button.
		$output .= '<li class="aardex-mega-menu--list_item_group_label">';

		$output .= $this->args['label'];

		$output .= '</li>';

		if ( $this->inner_items !== null ) {
			foreach ( $this->inner_items as $item ) {
				$output .= $item->render();
			}
		}

		$output .= '</ul>';
		$output .= '</li>';

		return $output;
	}
}
