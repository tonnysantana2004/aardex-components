<?php
/**
 * Pannel Template
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
class Pannel {

	/**
	 * Items of the pannel
	 *
	 * @var object[]
	 */
	public array $pannel_items;

	/**
	 * Arguments for the pannel
	 * TODO: Extract args to variables
	 *
	 * @var array
	 */
	public array $args;

	/**
	 * Panel unique ID
	 *
	 * @var string
	 */
	public string $pannel_id = '';

	/**
	 * Make Function
	 *
	 * @param array $args Array with the arguments.
	 */
	public static function make( $args ) {
		$instance            = new self();
		$instance->args      = $args;
		$instance->pannel_id = wp_unique_id( 'aardex-mega-menu-pannel-' );

		return $instance;
	}

	/**
	 * Add new items to the pannel.
	 *
	 * @param object[] $new_items Array with list items objects.
	 */
	public function add_items( $new_items ) {
		$this->pannel_items = $new_items;
		return $this;
	}


	/**
	 * Render the component
	 */
	public function render() {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--pannel " id="' . $this->pannel_id . '">';

		// Button.
		$output .= '<button class="aardex-mega-menu--pannel_back_button" data-pannel-id="' . $this->pannel_id . '">';

		// Icon.
		// Ignoring because I am not fetching any data from remote, but using it locally.
		$output .= file_get_contents( AARDEX_COMPONENTS_PLUGIN_DIR . 'assets/components/mega-menu/svg/arrow-left.svg' ); //phpcs:ignore

		$output .= 'Back';

		$output .= '</button>';

		// Content.
		$output .= '<ul class="aardex-mega-menu--children">';

		if ( isset( $this->args['see_all_button'] ) ) {

			$output .= '<li class="aardex-mega-menu--pannel_see_all">';
			$output .= '<a href="' . $this->args['see_all_button']['link'] . '">';
			$output .= $this->args['see_all_button']['label'];
			$output .= '</a>';
			$output .= '</li>';
		}

		if ( ! empty( $this->pannel_items ) ) {

			$i = 0;

			foreach ( $this->pannel_items as $item ) {
				$output .= $item->render();

				++$i;

				if ( count( $this->pannel_items ) !== $i ) {

					$output .= '<div class="aardex-mega-menu--vertical-spacing"></div>';
				}
			}
		}

		$output .= '</ul>';

		$output .= '</li>';

		return $output;
	}
}
