<?php

/* Template Name: Contact */

$header  = get_field( 'header' );
$content = get_field( 'content' );
$contact = get_field( 'contact' );

?>


<?php get_header(); ?>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>

	<main class="container flex-grow">
		<article class="grid gap-12 px-8 py-12">

			<div class="grid-layout grid-cols-2 lg:grid-cols-7 gap-x-4 gap-y-12">

				<section class="col-span-full lg:col-span-3 pt-6 lg:pt-8 lg:pr-16 border-t">
					<div class="grid gap-4">
						<p class="text-2xl leading-tight font-regular"><?php echo $header['title']; ?></p>
						<p class="text-xl leading-tight font-light"><?php echo $header['description']; ?></p>
						<?php if($header['button']): ?>
						<button class="text-xs py-2 px-3 border border-black text-black rounded-full w-fit">
							<a	
								style="text-decoration: none"
								href="<?php echo $header['button']['url'] ?>" 
								target="<?php echo $header['button']['target'] ?>"
							>
								<?php echo $header['button']['title'] ?>
							</a>
						</button>
						<?php endif; ?>
					</div>
				</section>

				<section class="col-span-1 lg:col-span-2 pt-4 lg:pt-8 lg:pr-16 border-t">
					<div class="grid gap-4">
						<?php the_content(); ?>
					</div>
				</section>

				<section class="col-span-1 lg:col-span-2 pt-4 lg:pt-8 lg:pr-16 border-t">
					<div class="grid gap-8">
						<?php echo $contact['text']; ?>
						<?php $social_links = $contact['social']['links']; ?>
						<?php require locate_template( 'template-parts/blocks/social-links.php' ); ?>
						<?php if($contact['button']): ?>
						<button class="text-xs py-2 px-3 border border-black text-black rounded-full w-fit">
							<a
								href="<?php echo $contact['button']['url'] ?>" 
								target="<?php echo $contact['button']['target'] ?>"
							>
								<?php echo $contact['button']['title'] ?>
							</a>
						</button>
						<?php endif; ?>
					</div>
				</section>

			</div>

		</article>
	</main>

<?php endwhile; ?>

<?php get_footer(); ?>
