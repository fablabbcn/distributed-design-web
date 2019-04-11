<div class="<?php echo esc_attr( $post_type ); ?>-content overflow-hidden">
	<?php foreach ( $terms as $key => $term ) : ?>
		<?php $item_id = $post_type . '-list-' . get_term_slug( $term ); ?>
		<?php $item_class = 0 === $key ? '' : 'clip'; ?>

		<div id="<?php echo esc_attr( $item_id ); ?>" class="<?php echo esc_attr( $item_class ); ?>">
			<?php set_query_var( 'term', $term ); ?>
			<?php get_template_part( "template-parts/archive/loop-$post_type" ); ?>
		</div>

	<?php endforeach; ?>

	<div id="<?php echo esc_attr( $post_type . '-empty' ); ?>" class="clip">
		<div class="border-l" style="margin-left: 27.9%;">

			<div class="p-40 text-36 uppercase">
				<header class="font-bold"><p>Sorry!</p></header>
				<p>There's no events. Try choosing a different month.</p>
			</div>

			<div class="flex -mx-border bg-events-empty bg-left bg-contain border-t-px border-b-px"
				style="height: 160px; background-repeat: round;"></div>

		</div>
	</div>

</div>
