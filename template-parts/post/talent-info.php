<section class="flex flex-col">

	<header>
		<figure class="-mt-20 -mx-40 mb-20">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'block w-full' ) ); ?>
		</figure>
		<p class="flex flex-wrap items-baseline">
			<span class="text-36 font-oswald uppercase"><?php the_field( 'name' ); ?></span>
			<span class="ml-10 capitalize">(<?php the_field( 'title' ); ?>)</span>
		</p>
	</header>

	<div class="my-20 text-18">
		<?php if ( get_field( 'profession' ) ) : ?>
			<p class=""><span class="font-bold">Profession:</span> <?php echo wp_kses_post( get_field( 'profession' ) ); ?></p>
		<?php endif; ?>
		<?php if ( get_field( 'project' )['name'] ) : ?>
			<p class=""><span class="font-bold">Project:</span> <?php echo wp_kses_post( get_field( 'project' )['name'] ); ?></p>
		<?php endif; ?>
		<?php if ( get_field( 'city' ) ) : ?>
			<p class=""><span class="font-bold">Based in:</span> <?php echo wp_kses_post( get_field( 'city' ) ); ?></p>
		<?php endif; ?>
		<?php if ( get_field( 'organization' )['name'] ) : ?>
			<p class=""><span class="font-bold">Works at:</span> <?php echo wp_kses_post( get_field( 'organization' )['name'] ); ?></p>
		<?php endif; ?>
	</div>

	<div class="flex flex-wrap -mx-5 mt-15">
		<?php $social_links = get_field( 'social_media' )['links']; ?>
		<?php require locate_template( 'template-parts/blocks/social-links.php' ); ?>
	</div>

	<p class="font-oswald text-center uppercase">
		<a class="block w-full my-20 px-20 py-10 no-underline border"
			href="<?php echo esc_url( get_field( 'project' )['link'] ); ?>">View Project</a>
		<a class="block w-full my-20 px-20 py-10 no-underline border"
			href="<?php echo esc_url( get_field( 'website' ) ); ?>">Visit Web</a>
	</p>

</section>
