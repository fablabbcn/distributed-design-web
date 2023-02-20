<?php

/* Template Name: Contact */

$header  = get_field( 'header' );
$content = get_field( 'content' );
$contact = get_field( 'contact' );

?>


<?php get_header(); ?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>

	<main class="flex-grow">
		<article class="grid gap-12 px-8 py-12">

			<?php set_query_var( 'title', get_the_title() ); ?>
			<?php get_template_part( 'template-parts/page/header' ); ?>

			<div class="grid grid-cols-2 gap-x-4 gap-y-12">

				<section class="col-span-full pt-8 border-t">
					<div class="grid gap-4">
						<p class="text-2xl leading-tight font-regular"><?php echo $header['title']; ?></p>
						<p class="text-xl leading-tight font-light"><?php echo $header['description']; ?></p>
					</div>
				</section>

				<section class="pt-4 border-t">
					<div class="grid gap-4">
						<?php the_content(); ?>
					</div>
				</section>

				<section class="pt-4 border-t">
					<div class="grid gap-8">
						<p><?php echo $contact['social']['title']; ?></p>
						<?php $social_links = $contact['social']['links']; ?>
						<?php require locate_template( 'template-parts/blocks/social-links.php' ); ?>
					</div>
				</section>

			</div>

		</article>
	</main>

<?php endwhile; ?>

<?php get_footer(); ?>
