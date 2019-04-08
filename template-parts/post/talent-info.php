<section class="flex flex-col">

	<header>
		<figure class="-mt-20 -mx-20 lg:-mx-40 mb-20">
			<?php echo wp_get_attachment_image( get_field( 'image' ), 'post-thumbnail', false, array( 'class' => 'block w-full' ) ); ?>
		</figure>
		<p class="text-36 font-oswald uppercase"><?php the_field( 'name' ); ?></p>
	</header>

	<div class="my-20">
		<?php if ( get_field( 'profession' ) ) : ?>
			<p style="margin-top: 0;"><span class="font-bold">Profession:</span> <?php the_field( 'profession' ); ?></p>
		<?php endif; ?>
		<?php if ( get_field( 'project' ) ) : ?>
			<p style="margin-top: 0;"><span class="font-bold">Project:</span> <?php the_field( 'project' ); ?></p>
		<?php endif; ?>
		<?php if ( get_field( 'city' ) ) : ?>
			<p style="margin-top: 0;"><span class="font-bold">Based in:</span> <?php the_field( 'city' ); ?></p>
		<?php endif; ?>
		<?php if ( get_field( 'organization' ) ) : ?>
			<p style="margin-top: 0;"><span class="font-bold">Platform Member:</span> <?php the_field( 'organization' ); ?></p>
		<?php endif; ?>
	</div>

	<div class="flex flex-wrap -mx-5 mt-15">
		<?php $social_links = get_field( 'social_media' )['links']; ?>
		<?php require locate_template( 'template-parts/blocks/social-links.php' ); ?>
	</div>

	<p class="font-oswald text-center uppercase">
		<?php foreach ( get_field( 'buttons' ) ?: array() as $button ) : ?>
			<a class="block w-full my-20 px-20 py-10 hocus:text-black hocus:bg-primary no-underline border"
				href="<?php echo esc_url( $button['url'] ); ?>"><?php echo esc_html( $button['label'] ); ?></a>
		<?php endforeach; ?>
	</p>

</section>
