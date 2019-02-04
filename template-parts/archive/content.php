<div class="<?php echo esc_attr( $post_type ); ?>-content overflow-hidden">
<?php foreach ( $terms as $key => $term ) : ?>
	<?php $item_id = $post_type . '-list-' . get_term_slug( $term ); ?>
	<?php $item_class = 0 === $key ? '' : 'clip'; ?>

	<div id="<?php echo esc_attr( $item_id ); ?>" class="<?php echo esc_attr( $item_class ); ?>">
		<?php set_query_var( 'term', $term ); ?>
		<?php get_template_part( "template-parts/archive/loop-$post_type" ); ?>
	</div>

<?php endforeach; ?>
</div>
