<?php
/**
 * List Item Group Template
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
class ItemsGroup {

	/**
	 * Label for the menu item
	 *
	 * @var string
	 */
	public string $label;

	/**
	 * Inner Items objects array
	 *
	 * @var SecondLevelItem[]
	 */
	public array $inner_items;

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
	 * Add the inner items.
	 *
	 * @param SecondLevelItem[] $new_items Inner items objects array.
	 */
	public function add_items( $new_items ) {
		$this->inner_items = $new_items;
		return $this;
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

		$output .= $this->label;

		$output .= '</li>';

		if ( $this->inner_items !== null ) {
			foreach ( $this->inner_items as $item ) {
				$output .= $item?->render();
			}
		}

		$output .= '</ul>';
		$output .= '</li>';

		return $output;
	}
}
