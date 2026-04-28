<?php
/**
 * First Level Button Template
 *
 * @param array $item_args Array with the template variables.
 * @param array $rendered_inner_items Array with the template variables.
 *
 * @package AARDEX
 */

?>
<li class="aardex-mega-menu--first_level">

	<button class="aardex-mega-menu--first_level-button" >
		<?php echo esc_html( $item_args['label'] ); ?>
		<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M6 12L10 8L6 4" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</button>

	<?php if ( ! empty( $rendered_inner_items ) ) : ?>

	<div class="aardex-mega-menu--children">
		<?php echo wp_kses_post( $rendered_inner_items ); ?>
	</div>
	
	<?php endif; ?>

</li>