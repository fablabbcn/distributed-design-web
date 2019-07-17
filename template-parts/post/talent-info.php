<?php

$talent_features = array(
	array( 'profession', 'Profession:' ),
	array( 'project', 'Project:' ),
	array( 'city', 'Based in:' ),
	array( 'organization', 'Platform Member:' ),
	array( 'workplace', 'Works at:' ),
);

?>


<section class="flex flex-col">

	<header>
		<figure class="-mt-20 -mx-20 lg:-mx-40 mb-20">
			<?php echo wp_get_attachment_image( get_field( 'image' ), 'post-thumbnail', false, array( 'class' => 'block w-full' ) ); ?>
		</figure>
		<p class="text-20 lg:text-36 font-oswald uppercase"><?php the_field( 'name' ); ?></p>
	</header>

	<div class="my-20">
		<?php foreach ( $talent_features as $talent_feature ) : ?>
			<?php if ( get_field( $talent_feature[0] ) ) : ?>
				<p style="margin-top: 0;">
					<span class="font-bold"><?php echo esc_html( $talent_feature[1] ); ?></span>
					<span><?php the_field( $talent_feature[0] ); ?></span>
				</p>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>

	<div class="flex flex-wrap -mx-5 mt-15">
		<?php $social_links = get_field( 'social_media' )['links']; ?>
		<?php require locate_template( 'template-parts/blocks/social-links.php' ); ?>
	</div>

	<p class="font-oswald text-center uppercase">
		<?php foreach ( get_field( 'buttons' ) ?: array() as $button ) : ?>
			<?php if ( $button['url'] ) : ?>
				<a class="block w-full my-20 px-20 py-10 hocus:text-black hocus:bg-primary no-underline border"
					href="<?php echo esc_url( $button['url'] ); ?>"><?php echo esc_html( $button['label'] ?: $button['url'] ); ?></a>
			<?php endif; ?>
		<?php endforeach; ?>
	</p>

</section>
