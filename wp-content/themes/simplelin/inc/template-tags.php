<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Simplelin
 */

if ( ! function_exists( 'simplelin_entry_meta' ) ) :
/**
 * Displays the post meta.
 */
function simplelin_entry_meta() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated hide" datetime="%3$s">%4$s</time>';
			}
		
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'on %s', 'post date', 'simplelin' ),
		'<a href="' . esc_url( home_url() ) . '/' . date( 'Y/m . ', strtotime( get_the_date() ) ) . '" rel="bookmark" class="meta-date">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'Published by %s ', 'post author', 'simplelin' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline">' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>';
}
endif;



if ( ! function_exists( 'simplelin_new_excerpt_more' ) ) :
/**
 * Remove [...] string using Filters
 */
function simplelin_new_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip; ';
}
endif;
add_filter( 'excerpt_more', 'simplelin_new_excerpt_more' );



if ( ! function_exists( 'simplelin_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function simplelin_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'simplelin' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'simplelin' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
}
endif;



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function simplelin_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'simplelin_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array( 
			'fields'       => 'ids',
			'hide_empty'   => 1,
			// We only need to know if there is more than one category.
			'number'       => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'simplelin_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so simplelin_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so simplelin_categorized_blog should return false.
		return false;
	}
}



/**
 * Flush out the transients used in simplelin_categorized_blog.
 */
function simplelin_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'simplelin_categories' );
}
add_action( 'edit_category', 'simplelin_categoty_transient_flusher' );
add_action( 'save_post', 'simplelin_category_transient_flusher' );



if ( ! function_exists( 'simplelin_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own simplelin_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @return void
 */
function simplelin_comment( $comment, $args, $depth ) {
	switch( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'simplelin' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'simplelin' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default;
			// Proceed with normal comments.
			global $post;
		?>
		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 70 ); ?>
						<?php
							printf( '<b class="fn">%1$s</b> %2$s',
								get_comment_author_link(),
								// If current post author is also comment author, make it known visually.
								( $comment->user_id === $post->post_author ) ? '<span>' . __( 'POST AUTHOR', 'simplelin' ) . '</span>' : ''
                        	);
						?>
					</div>
					<div class="comment-metadata">
						<?php
							printf( '<a class="comment-time" href="%1$s"<time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								get_comment_date()
							);
							edit_comment_link( __( 'Edit', 'simplelin' ), '<span class="edit-link">', '</span>' );
						?>
					</div><!-- .comment-metadata -->
				</footer><!-- .comment-meta -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'simplelin' ); ?></p>
				<?php endif; ?>

				<div class="comment-content">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->

				<?php
					comment_reply_link( array_merge( $args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<span class="reply">',
						'after'     => '</span>',
					) ) );
				?>

			</article><!-- #comment-## -->
		<?php
			break;
		endswitch; // end comment_type check
}
endif;



if ( ! function_exists( 'simplelin_the_breadcrumb') ) :
/**
 * Bradcrumbs
 */
function simplelin_the_breadcrumb() {
	if ( is_front_page() ) {
		return;
	}
	echo '<span>' . esc_attr__( 'You are here:', 'simplelin' ) . '</span>';
	echo '<span typeof="v:Breadcrumb" class="root"><a rel="v:url" property="v:title" href="';
	echo esc_url( home_url() );
	echo '">' . esc_html( sprintf( __( "Home", 'simplelin' ) ) );
	echo '</a></span><span>/</span>';
	if ( is_single() ) {
		$categories = get_the_category();
		if ( $categories ) {
			$level = 0;
			$hierarchy_arr = array();
			foreach( $categories as $cat ) {
				$anc = get_ancestors( $cat->term_id, 'category' );
				$count_anc = count( $anc );
				if ( 0 < $count_anc && $level < $count_anc ) {
					$level = $count_anc;
					$hierarchy_arr = array_reverse( $anc );
					array_push( $hierarchy_arr, $cat->term_id );

				}
			}
			if ( empty( $hierarchy_arr ) ) {
				$category = $categories[0];
				echo '<span typeof="v:Breadcrumb"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" rel="v:url" property="v:title">' . esc_html( $category->name ) . '</a></span><span>/</span>';
			} else {
				foreach( $hierarchy_arr as $cat_id ) {
					$category = get_term_by( 'id', $cat_id, 'category' );
					echo '<span typeof="v:Breadcrumb"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" rel="v:url" property="v:title">' . esc_html( $category->name ) . '</a></span><span>/</span>';
				}
			}
		}
		echo "<span><span>";
		the_title();
		echo "</span></span>";
	} elseif ( is_page() ) {
		$parent_id = wp_get_post_parent_id( get_the_ID() );
		if ( $parent_id ) {
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page = get_page( $parent_id );
				$breadcrumbs[] = '<span typeof="v:Breadcrumb"><a href="' . esc_url( get_permalink( $page->ID ) ) . '" rel="v:url" property="v:title">' . esc_url( get_permalink( $page->ID) ) . '" rel="v:url" property="v:title">' . esc_html( get_the_title( $page->ID ) ). '</a></span><span>/</span>';
				$parent_id = $page->post_parent; 
			}
			$breadcrumbs = array_reverse( $breadcrumbs );
			foreach( $breadcrumbs as $crumb ) { echo $crumb; }
		}
		echo "<span><span>";
		the_title();
		echo "</span></span>";
	} elseif ( is_category() ) {
		global $wp_query;
		$cat_obj = $wp_query->get_queried_abject();
		$this_cat_id = $cat_obj->term_id;
		$hierarchy_arr = get_ancestors( $this_cat_id, 'category' );
		if ( $hierarchy_arr ) {
			$hierarchy_arr = array_reverse( $hierarchy_arr );
			foreach( $hierarchy_arr as $cat_id ) {
				$category = get_term_by( 'id', $cat_id, 'category' );
				echo '<span typeof="v:Breadcrumb"><a href="' . esc_url( get_category_link( $category->term_id ) ) .'" rel="v:url" property="v:title">' .esc_html( $category->name ). '</a></span><span>/</span>';
			}
		}
		echo "<span><span>";
		single_cat_title();
		echo "</span></span>";

	} elseif ( is_author() ) {
		echo "<span><span>";
		if ( get_query_var( 'author_name') ) :
			$curauth = get_user_by( 'slug', get_query_var( 'author_name') );
		else :
			$curauth = get_userdata( get_query_var( 'author' ) );
		endif;
		echo esc_html( $curauth->nickname );
		echo "</span></span>";
	} elseif ( is_search() ) {
		echo "<span><span>";
		the_search_query();
		echo "</span></span>";
	} elseif ( is_tag() ) {
		echo "<span><span>";
		sibgle_tag_title();
		echo "</span></span>";
	}
}
endif;



if ( ! function_exists( 'simplelin_footer_site_info' ) ) :
/**
 * Add Copyright and Credit text to footer
 */
function simplelin_footer_site_info() {
	$site_link = '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name', 'display' ) . '</a>';

	$cd_link = '<a href="' . 'https://wordpress.org/themes/simplelin' . '" target="_blank" title="' . esc_attr__( 'Theme for WordPress', 'simplelin' ) .'">' . __( 'Simplelin', 'simplelin' ) . '</a>';

	$tg_link = '<a href="' . 'https://ninethemes.wordpress.com' . '" target="_blank" rel="designer">' . __( 'Nine Themes', 'simplelin' ) . '</a>';

	$default_footer_value = '<div class="copyright">' . sprintf( __( 'Copyright &copy; %1$s %2$s', 'simplelin' ), date( 'Y' ), $site_link ) . '</div><div class="credit">' . sprintf( __( 'Theme %1$s', 'simplelin' ), $cd_link ) . ' ' . sprintf( __( 'by %1$s', 'simplelin' ), $tg_link ) . '</div>';

	echo $default_footer_value;
}
endif;