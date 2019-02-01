<?php

/* Template Name: Contact */

$header  = get_field( 'header' );
$content = get_field( 'content' );
$contact = get_field( 'contact' );

$button_classes = 'flex justify-center items-center p-10 bg-white border rounded-full';

?>


<?php get_header(); ?>


<main class="flex flex-col flex-grow">

	<header class="w-full font-oswald uppercase border-b">
		<h1 class="lg:w-3/4 lg:ml-auto p-20 lg:px-40 text-16 lg:text-20 lg:text-41 leading-normal lg:border-l" style="width: 72.15%;">
			<?php echo $header['alt_title'] ?: get_the_title(); ?>
		</h1>
	</header>

	<div class="flex flex-wrap flex-grow lg:px-20 text-53 leading-none tracking-tight font-oswald font-light uppercase">

		<article class="w-full lg:w-2/3 p-20 lg:text-92">
			<div class=""><?php the_content(); ?></div>
		</article>

		<aside class="flex flex-col w-full lg:w-1/3 p-20 border-t lg:border-t-0 lg:border-l">

			<header class="flex -mx-10 pb-20 border-b lg:border-b-0">

				<h2 class="w-full px-10" style="font: inherit;"><?php echo $contact['email']['text']; ?></h2>

				<div class="w-full px-10">
					<div class="max-w-90 ml-auto">
						<p class="relative h-0 text-28 tracking-normal font-medium" style="padding-bottom: 100%;">
							<a class="invisible <?php echo esc_attr( $button_classes ); ?>"
								href="mailto:<?php echo $contact['email']['address']; ?>">Here</a>
							<a class="absolute pin w-full h-full <?php echo esc_attr( $button_classes ); ?>"
								href="mailto:<?php echo $contact['email']['address']; ?>">Here</a>
						</p>
					</div>
				</div>

			</header>

			<dl class="flex flex-wrap justify-between lg:justify-start mt-auto -mx-10 pt-20">
			<?php foreach ( $contact['social']['links'] as $link ) : ?>

				<dt class="clip"><?php echo $link['social_network']['label']; ?></dt>
				<dd class="px-10 leading-none">
					<a class="flex w-50 h-50 p-10 bg-white border rounded-full" href="<?php echo $link['url']; ?>">
						<svg class="fill-current"><use xlink:href="#<?php echo $link['social_network']['value']; ?>" /></svg>
					</a>
				</dd>

			<?php endforeach; ?>
			</dl>

		</aside>

	</div>

</main>


<?php get_footer(); ?>
