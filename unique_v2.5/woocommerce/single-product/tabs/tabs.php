<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs clearfix">
		<ul class="tabs single-product-tabs ">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php echo esc_attr($key) ?>_tab">
					<a href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters( 'woocommerce_product_' . esc_attr($key) . '_tab_title', esc_attr($tab['title']),esc_attr($key) ) // WPCS: XSS OK. ?></a>
				</li>

			<?php endforeach; ?>
		</ul>
		<div class="woo-tab-content">
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="panel entry-content" id="tab-<?php echo esc_attr(esc_attr($key)); ?>">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
			</div>

		<?php endforeach; ?>
	</div>
	</div>

<?php endif; ?>
