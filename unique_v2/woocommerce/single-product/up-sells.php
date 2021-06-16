<?php
/**
 * Upsells Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/upsells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$upsells = $product->get_upsell_ids();

if ( sizeof( $upsells ) == 0 ) return;

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->get_id() ),
	'meta_query'          => $meta_query
);
$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $related_product_columns;

if ( $products->have_posts() ) : ?>
<div class="upsells products">
	<h2><?php esc_html_e( 'You may also like&hellip;', 'julia' ); ?></h2>
	<div class="upsells-product-slider owl-carousel">
			<?php //woocommerce_product_loop_start(); ?>
			<?php while ( $products->have_posts() ) : $products->the_post(); 
			global $post,$product, $woocommerce_loop; ?>
			<div class="shop-products imghvr-slide-up">
				<div class="shop-produt-image">
							<?php if ( $product->is_on_sale() ) : ?>
							<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale-ribbon1"><span class="onsales">' . __( 'Sale!', 'julia' ) . '</span></span>', $post, $product );  // WPCS: XSS OK ?>
							<?php endif; ?>		
							<a href="<?php the_permalink(); ?>">
								<?php //display product thumbnail
								$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'kaya-gallery' ); 
								if ( $image_src ) { 
									$params = array('width' => '500', 'height' => '500', 'crop' => true);
									$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'kaya-gallery' ); 
										echo woocommerce_get_product_thumbnail(); // WPCS: XSS OK
									}
								else{
									echo '<img src="'.get_parent_theme_file_uri( '/images/woocommerce.jpg').'" style="width:300px; height:300px;">';  // WPCS: XSS OK
								}
								?>
								<span class="opacity_bg_color"></span>
							</a>
						<div class="product-cart-button figcaption">
							<?php
							
					$cart_data = apply_filters( 'woocommerce_loop_add_to_cart_link',
					sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s"><i class="fa fa-cart-plus"> </i></a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( isset( $quantity ) ? $quantity : 1 ),
							esc_attr( $product->get_id() ),
							esc_attr( $product->get_sku() ),
							esc_attr( isset( $class ) ? $class : 'button' ),
							esc_html( $product->add_to_cart_text() )
					),
					$product );
					echo wp_kses($cart_data, true);	?>
							<a class="product-link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
						</div>
				</div>			
				<div class="shop-product-details">
						<?php if ( $price_html = $product->get_price_html() ) : ?>
						<h4 class="price"><?php echo wp_kses($product->get_price_html(), true); ?></h4>	
							<?php endif;  ?>
						<h3 class="product_name"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							<?php if ($average = $product->get_average_rating()) : ?>			
							<div class="product-rating">
							<?php 
							 // WPCS: XSS OK
							echo '<div class="star-rating" title="Rated '. esc_attr($average).' out of 5"><span style="width:'.( ( esc_attr($average) / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.esc_attr($average).'</strong> '.esc_html__( 'out of 5', 'julia' ).'</span></div>'; // WPCS: XSS OK ?>
						</div>
						<?php
						else:
							 // WPCS: XSS OK
						echo '<div class="star-rating" title="Rated '. esc_attr($average).' out of 5"><span style="width:'.( (esc_attr($average) / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.esc_attr($average).'</strong> '.esc_html__( 'out of 5', 'julia' ).'</span></div>'; 
						endif; ?>
				</div>
			</div>
			<?php endwhile; // end of the loop. ?>
	</div>
</div>
<?php endif;
wp_reset_postdata(); ?>
