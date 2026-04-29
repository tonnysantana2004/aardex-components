<?php
/**
 * Pannel Template
 *
 * @param array $args Array with the template variables.
 * @param array $rendered_inner_items Array with the template variables.
 *
 * @package AARDEX
 */

/**
 * Class for the component
 */
class Pannel {

	/**
	 * Items of the pannel
	 *
	 * @var object[]
	 */
	public array $pannel_items;

	/**
	 * Arguments for the pannel
	 *
	 * @var array
	 */
	public array $args;

	/**
	 * Construct function
	 *
	 * @param array $args Array with the item arguments.
	 */
	public function __construct( $args ) {
		$this->args = $args;
	}

	/**
	 * Add new items to the pannel.
	 *
	 * @param object[] $new_items Array with list items objects.
	 */
	public function add_items( $new_items ) {
		$this->pannel_items = $new_items;
	}


	/**
	 * Render the component
	 */
	public function render() {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--pannel open" id="unique123">';

		// Button.
		$output .= '<button class="aardex-mega-menu--pannel_back_button" data-aardex-panel-id="unique123">';

		// Icon.
		// Ignoring because I am not fetching any data from remote, but using it locally.
		$output .= file_get_contents( __DIR__ . '/icon.svg' ); //phpcs:ignore

		$output .= 'Back';

		$output .= '</button>';

		// Content.
		$output .= '<div class="aardex-mega-menu--pannel_content">';
		$output .= '<ul class="aardex-mega-menu--children">';

		if ( isset( $this->args['see_all_button'] ) ) {

			$output .= '<li class="aardex-mega-menu--pannel_see_all">';
			$output .= '<a href="' . $this->args['see_all_button']['link'] . '">';
			$output .= $this->args['see_all_button']['label'];
			$output .= '</a>';
			$output .= '</li>';
		}

		if ( ! empty( $this->pannel_items ) ) {

			foreach ( $this->pannel_items as $item ) {
				$output .= $item->render();

			}
		}

		$output .= '</ul>';
		$output .= '</div>';

		$output .= '</li>';

		return $output;
	}
}
