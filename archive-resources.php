<?php

$post_type        = is_page_template( 'template-archive-events.php' ) ? 'tribe_events' : get_post_type();
$post_type_object = get_post_type_object( $post_type );

$tab_taxonomies = array(
    'tribe_events' => 'tribe_events_cat',
    'resources'    => 'resources_category',
);

$taxonomy   = $tab_taxonomies[ $post_type ];
$terms      = get_terms( $taxonomy );
$term_slugs = array_map( function ( $term ) {
    return $term->slug;
}, $terms);

function prefix_button_clip ( $term ) {
    global $post_type;
    return "$post_type-list-$term";
}

?>


<?php get_header(); ?>

<article class="flex-1">

	<div class="base-col">
		<?php set_query_var( 'post_type', $post_type ); ?>
		<?php set_query_var( 'taxonomy', $taxonomy ); ?>
		<?php set_query_var( 'terms', $terms ); ?>
		<?php set_query_var( 'term_slugs', $term_slugs ); ?>
		<?php get_template_part( 'template-parts/archive/header' ); ?>
		<?php get_template_part( 'template-parts/archive/aside', $post_type ); ?>
		<?php get_template_part( 'template-parts/archive/content' ); ?>
	</div>

	<?php // <div class="col"></div> ?>

</article>


<?php set_query_var( 'layout', $layout ); ?>
<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
