<?php
/**
 * First Level Button Template
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
class FirstLevelItem {

	/**
	 * Arguments for the menu item
	 *
	 * @var string
	 */
	public $label;

	/**
	 * Pannel Object
	 *
	 * @var object
	 */
	public $pannel;

	/**
	 * Make Class.
	 *
	 * @param string $label String with the item label.
	 */
	public static function make( $label ): FirstLevelItem {

		$instance        = new self();
		$instance->label = $label;

		return $instance;
	}

	/**
	 * Add the inner pannel.
	 *
	 * @param Pannel $pannel Pannel Object.
	 */
	public function add_pannel( $pannel ) {
		$this->pannel = $pannel;

		return $this;
	}

	/**
	 * Render the first level template
	 */
	public function render() {

		// Main Wrapper.
		$output = '<li class="aardex-mega-menu--first_level">';

		$pannel_id = $this->pannel?->pannel_id;

		$pannel_id_attribute = $pannel_id ? ( 'data-pannel-id="' . $pannel_id . '"' ) : '';

		// Button.
		$output .= '<button class="aardex-mega-menu--first_level_button" ' . $pannel_id_attribute . '>';
		$output .= $this->label;

		if ( $this->pannel !== null ) {
			// Chevron.
			// Ignoring because I am not fetching any data from remote, but using it locally.
            $output .= file_get_contents( AARDEX_COMPONENTS_PLUGIN_DIR . 'assets/components/mega-menu/svg/chevron.svg' ); //phpcs:ignore
		}

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
