<?php
/**
 * Main file of the megamenu.
 *
 * @package AARDEX
 */

add_shortcode(
	'mega_menu',
	function () {

		$menu_items = array(

			array(
				'label' => 'Solutions',
				'type'  => 'first_level',
			),
			array(
				'label' => 'Therapeutic Areas',
				'type'  => 'first_level',
			),
		);

		$mega_menu = new MegaMenuComponent();

		ob_start(); ?>

		<div class="aardex-mobile-menu--first_level-wrapper">
			<div class="aardex-mobile-menu">
				
				<ul>
					<?php

					// Ignoring the phpcs notice because the escaping
					// is being applied within the template.
                    echo $mega_menu->start( $menu_items ); //phpcs:ignore

					?>
					 
				</ul>
					
			</div>
		</div>

		<?php

		return ob_get_clean();
	}
);

/**
 * Mega Menu Component Class
 */
class MegaMenuComponent {

	public function start( $items ) {

		$output = '';

		foreach ( $items as $item ) {
			$output .= $this->render_field( $item );
		}

		return $output;
	}

	public function render_field( $args ) {

		$output = '';

		switch ( $args['type'] ) {

			case 'first_level':
				$output = $this->li_first_level( $args );
				break;

			case 'inner_page':
				$output = $this->inner_page( $args );
				break;
		}

		return $output;
	}

	public function li_first_level( $args ) {
		ob_start();

		if ( isset( $args['children'] ) ) {
			foreach ( $args['children'] as $child ) {
				'test';
			}
		}

		require AARDEX_COMPONENTS_DIR . '/templates/li-first-level.php';
		return ob_get_clean();
	}

	public function inner_page() {
		return '<li>teste</li>';
	}
}