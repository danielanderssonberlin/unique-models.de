<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

global $product;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<div class="shop-products">
		<div class="shop-produt-image">
			<div class="imghvr-slide-up">		
			<a href="<?php the_permalink(); ?>">
				<?php //display product thumbnail
					$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'kaya-gallery' ); 
					if ( $image_src ) { 
						$params = array('width' => '500', 'height' => '500', 'crop' => true);
						$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'kaya-gallery' ); 
						echo woocommerce_get_product_thumbnail(); // WPCS: XSS OK
					}
					else{
					echo '<img src="'.get_parent_theme_file_uri( '/images/woocommerce.jpg').'" style="width:100%; height:auto!important;">'; // WPCS: XSS OK
					}
					?>
			<span class="opacity_bg_color"></span>
			</a>
			<div class="figcaption">
			<div class="product-cart-button">
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
					echo wp_kses($cart_data, true);					
					?>
					<a class="product-link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
			</div>
		</div>
		<div class="shop-product-details">
			 <?php
			$disable_shop_page_content = get_theme_mod('disable_shop_page_content') ? get_theme_mod('disable_shop_page_content') : '0';  ?>
			<h3 class="product_name"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
			<?php if($disable_shop_page_content != 1) { ?>
			
				<?php } ?>
			<?php if ($average = $product->get_average_rating()) : ?>			
					<div class="product-rating">
					<?php
						/* translators: %s: Product rting. */
					 echo '<div class="star-rating" title="'.sprintf(esc_html__( 'Rated %s out of 5', 'julia' ), esc_attr($average)).'"><span style="width:'.( ( esc_attr($average) / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.esc_attr($average).'</strong> '.esc_html__( 'out of 5', 'julia' ).'</span></div>'; ?>
					</div>
					<?php
					else:
						/* translators: %s: Product rting. */
				echo '<div class="star-rating" title="'.sprintf(esc_html__( 'Rated %s out of 5', 'julia' ),esc_attr($average)).'"><span style="width:'.( ( esc_attr($average) / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.esc_attr($average).'</strong> '.esc_html__( 'out of 5', 'julia' ).'</span></div>';
				 endif; ?>
				 <?php if ( $price_html = $product->get_price_html() ) : ?>
				<h4 class="price"><?php echo wp_kses($product->get_price_html(), true); ?></h4>	
			<?php endif; ?>
			</div>
		</div>
		</div>			
		
	</div>
</li>