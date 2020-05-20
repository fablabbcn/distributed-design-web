<?php

$facet_pager = do_shortcode( '[facetwp facet="pager_"]' );

$paginate_links = str_replace(
	array( 'page-numbers', 'current' ),
	array( 'hocus:text-primary no-underline', 'font-bold' ),
	paginate_links(
		array(
			'mid_size'  => 3,
			'prev_next' => true,
			'type'      => 'array',
		)
	)
);

?>


<nav class="flex justify-center p-20 border-t-px border-b border-solid">

	<?php if ( $facet_pager ) : ?>
		<?php echo wp_kses_post( $facet_pager ); ?>

	<?php else : ?>
		<ul class="list-reset flex text-16 md:text-29">
			<?php if ( $paginate_links ) : ?>
				<?php foreach ( $paginate_links as $paginate_link ) : ?>
					<li class="px-10"><?php echo wp_kses_post( $paginate_link ); ?></li>
				<?php endforeach; ?>
			<?php else : ?>
				<li class="p-5"><span class="page-numbers current">1</span></li>
			<?php endif; ?>
		</ul>

	<?php endif; ?>

</nav>
