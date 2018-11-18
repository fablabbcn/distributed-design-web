<?php
/**
 * Template part for displaying posts
 */
?>


<a href="<?php the_permalink(); ?>">
	<div id="post-<?php the_ID(); ?>" class="grid-item">
		<div class="cf post-cont relative">

			<div class="fl w-100 post-left" style="background: url('<?php the_post_thumbnail_url(); ?>') center no-repeat; background-size: cover;">
				<?php the_post_thumbnail(); ?>
			</div>

			<div class="fl w-100 post-right">
				<p class="b ttu"><?php the_title(); ?></p>
				—
				<p><?php the_field( 'subtitle' ); ?></p>
				<p class="absolute bottom-1 dib b">Read More<!--<span class="dib ml-3 read-more-icon"><?php include get_template_directory() . '/assets/images/read-more.svg'; ?></span>--></p>
			</div>

		</div>
	</div>
</a>
