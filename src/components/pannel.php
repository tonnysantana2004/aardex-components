<?php
/**
 * Pannel Template
 *
 * @param array $args Array with the template variables.
 * @param array $rendered_inner_items Array with the template variables.
 *
 * @package AARDEX
 */

?>
<div class="aardex-mega-menu--pannel" data-open="true" data-page-id="15">

	<button class="aardex-mega-menu--pannel_back_button">
		<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M12.6666 8.00004H3.33331M3.33331 8.00004L7.99998 12.6667M3.33331 8.00004L7.99998 3.33337" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
		<?php echo esc_html( 'Back' ); ?>
	</button>

	<div class="aardex-mega-menu--pannel-content">
		<ul >

			<?php if ( isset( $args['see_all_button'] ) ) : ?>

			<li>
				<a href="<?php echo esc_html( $args['see_all_button']['link'] ); ?>"
				class="aardex-mega-menu--pannel_see_all">
					<?php echo esc_html( $args['see_all_button']['label'] ); ?>
				</a>
			</li>

			<?php endif; ?>
			
		</ul>
	</div>
	
</div>