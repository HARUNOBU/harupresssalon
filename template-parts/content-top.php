<?php
/**
 * The Content-top template
 * @package   harupress
 * @copyright Copyright (c) 2014 Mignon Style
 * @license   GNU General Public License v2.0
 * @since     harupress 1.0
 */
?>
<?php if ( is_search() || is_archive() ) : ?>
<header id="content-header">
	<div id="content-top">
		<h1 class="page-title">
		<?php
		$cpt = get_post_type_object( get_post_type() );
		$taxonomy_names = get_post_taxonomies();
		$taxonomy_names = ( ! empty( $taxonomy_names ) ) ? $taxonomy_names[0] : '';

		if ( ! empty( $cpt ) && is_post_type_archive( $cpt ) ) {
			printf( __( 'Post Type : %s', 'harupress' ), esc_html( $cpt -> label ) );
		} elseif ( ! empty( $taxonomy_names ) && is_tax( $taxonomy_names ) ) {
			$query_tax = get_queried_object();
			printf( __( 'Category : %s', 'harupress' ), esc_html( $query_tax -> name ) );
		} elseif ( is_search() ) {
			printf( __( 'Search Results of "%s"', 'harupress' ), '<span class="search-str">' . get_search_query() . '</span>' );
		} elseif ( is_category() ) {
			printf( __( 'Category : %s', 'harupress' ), single_cat_title( '' , false ) );
		} elseif ( is_tag() ) {
			printf( __( 'Tag : %s', 'harupress' ), single_tag_title( '' , false ) );
		} elseif ( is_year() ) {
			the_time( __( 'Y', 'harupress' ) );
		} elseif ( is_month() ) {
			the_time( __( 'F Y', 'harupress' ) );
		} elseif ( is_day() ) {
			the_time( __( 'F j, Y', 'harupress' ) );
		} elseif ( is_author() ) {
			printf( __( 'Author : %s', 'harupress' ), get_the_author() );
		} else {
			_e( 'Archives', 'harupress' );
		}
		?>
		</h1>
		<p><?php printf( __( '%d posts', 'harupress' ), absint( $wp_query->found_posts ) ); ?></p>
	</div><!-- /content-top -->
</header><!-- /content-header -->
<?php endif; ?>
