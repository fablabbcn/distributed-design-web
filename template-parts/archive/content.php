<div class="<?php echo $post_type; ?>-content overflow-hidden">
<?php foreach ( $terms as $key => $term ) : ?>

	<div id="<?php echo $post_type; ?>-list-<?php echo get_term_slug( $term ); ?>" class="<?php echo 0 === $key ? '' : 'clip'; ?>">
		<?php set_query_var( 'term', $term ); ?>
		<?php get_template_part( "template-parts/archive/loop-$post_type" ); ?>
	</div>

<?php endforeach; ?>
</div>
