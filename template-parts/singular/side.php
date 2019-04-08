<?php if ( 'talent' !== $post_type ) : ?>
	<div>
		<p class="b"><?php the_field( 'left_column_heading' ); ?></p>
		<p>-</p>
		<p><?php the_field( 'left_column_subheading' ); ?></p>
		<p class="absolute bottom-2 b"><?php the_field( 'left_column_bottom' ); ?></p>
	</div>

<?php else : ?>
	<?php get_template_part( 'template-parts/post/talent', 'info' ); ?>


<?php endif; ?>
