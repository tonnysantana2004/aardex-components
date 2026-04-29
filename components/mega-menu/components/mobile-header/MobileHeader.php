<?php
/**
 * Mobile Header Template
 *
 * @package AARDEX
 */

/**
 * Class for the component
 */
class MobileHeader {

	/**
	 * Render the first level template
	 */
	public function render() {

		ob_start();

		// Main Wrapper.
		$output = '<div class="aardex-mega-menu--mobile-header">';

		// Logo Wrapper.
		$output .= '<div class="aardex-mega-menu--mobile-header-logo" >';

		// Icon.
		// Ignoring because I am not fetching any data from remote, but using it locally.
		$output .= file_get_contents( __DIR__ . '/logo.svg' ); //phpcs:ignore

		$output .= '</div>';

		// Logo Wrapper.
		$output .= '<button class="aardex-mega-menu--mobile-header-close" >';

		// Icon.
		// Ignoring because I am not fetching any data from remote, but using it locally.
		$output .= file_get_contents( __DIR__ . '/close-menu.svg' ); //phpcs:ignore

		$output .= '</button>';

		$output .= '</div>';

		return $output;
	}
}
