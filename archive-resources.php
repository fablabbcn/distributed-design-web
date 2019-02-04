<?php

$post_type = is_page_template( 'template-archive-events.php' ) ? 'tribe_events' : get_post_type();

$tab_taxonomies = array(
	'tribe_events' => 'tribe_events_cat',
	'resources'    => 'resources_category',
);

$taxonomy = $tab_taxonomies[ $post_type ];
$terms    = 'tribe_events' === $post_type
	? array( '2018', '2019' )
	: get_terms( $taxonomy );

function get_term_slug( $term ) {
	return is_object( $term ) ? $term->slug : $term;
}

function get_term_name( $term ) {
	return is_object( $term ) ? $term->name : $term;
}

function get_term_month( $term ) {
	$month = date( 'm', strtotime( "$term/01/2019" ) );
	return $month;
}

function get_button_clip( $terms, $term, $pad, $get_callback ) {
	global $post_type;

	$terms_slugs = array_map( 'get_term_slug', $terms );
	$terms_diff  = array_diff( $terms_slugs, [ $get_callback( $term ) ] );

	$button_clip = implode(
		', ',
		array_map(
			function ( $term ) use ( $pad ) {
				global $post_type;
				return "$post_type-$pad-$term";
			},
			array_merge( [ '' ], $terms_diff )
		)
	);

	return $button_clip;
}

?>


<?php get_header(); ?>

<article class="flex-1">

	<div class="base-col">
		<?php set_query_var( 'post_type', $post_type ); ?>
		<?php set_query_var( 'taxonomy', $taxonomy ); ?>
		<?php set_query_var( 'terms', $terms ); ?>
		<?php get_template_part( 'template-parts/archive/header' ); ?>
		<?php get_template_part( 'template-parts/archive/aside', $post_type ); ?>
		<?php get_template_part( 'template-parts/archive/content' ); ?>
	</div>

	<?php // <div class="col"></div> ?>

</article>


<?php get_template_part( 'template-parts/forms/index' ); ?>

<?php set_query_var( 'layout', $layout ); ?>
<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
