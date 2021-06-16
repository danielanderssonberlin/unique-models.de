<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package julia
 */

if ( ! function_exists( 'julia_kaya_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function julia_kaya_posted_on() {
	
	$byline = sprintf(
		/* translators: 1: Authotr name */
		__( 'by %1$s', 'julia' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
	); // WPCS: XSS OK.

	echo '<span><i class="fa fa-calendar"></i> '.get_the_date('F d, Y').'</span>';
	echo '<span class="author-meta"> <i class="fa fa-user"></i>' . wp_kses($byline, true) . '</span>'; ?>
	<span><i class="fa fa-folder"></i> <?php the_category(', '); ?></span>
	<?php
	$tag_list = get_the_tag_list( '<span><i class="fa fa-tag"></i> ', ', ', '</span>' ); 
	if ( $tag_list && ! is_wp_error( $tag_list ) ) {
	    echo wp_kses($tag_list, true);
	} ?>

<?php }
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function julia_kaya_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'julia_kaya_category_transient_flusher' ) ) ) {
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );

		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'julia_kaya_category_transient_flusher', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Flush out the transients used in julia_kaya_categorized_blog.
 */
function julia_kaya_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	delete_transient( 'julia_kaya_category_transient_flusher' );
}
add_action( 'edit_category', 'julia_kaya_category_transient_flusher' );
add_action( 'save_post',     'julia_kaya_category_transient_flusher' );
