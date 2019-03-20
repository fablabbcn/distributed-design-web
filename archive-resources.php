<?php

$post_type = is_page_template( 'template-archive-events.php' ) ? 'tribe_events' : get_post_type();

$tab_taxonomies = array(
	'tribe_events' => 'tribe_events_cat',
	'resources'    => 'resources_category',
);

$taxonomy = $tab_taxonomies[ $post_type ];
$terms    = 'tribe_events' === $post_type
	? array( '2019', '2018' )
	: get_terms( $taxonomy );

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
