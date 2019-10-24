<?php

$contact = get_field( 'contact', 'options' );

$logo = array(
	'src' => get_stylesheet_directory_uri() . '/assets/images/ce-logo.png',
	'alt' => 'Co-funded by the Creative European Programme of the European Union',
);

?>


		<footer id="footer" class="rich-text mt-auto">

			<?php get_template_part( 'template-parts/blocks/footer/newsletter' ); ?>
			<?php get_template_part( 'template-parts/blocks/footer/logos' ); ?>

			<div class="md:flex justify-between px-15 lg:px-40 py-20 text-16 border-t">
				<div class="md:text-left"><?php echo wp_kses_post( $contact['left'] ); ?></div>
				<div class="md:text-right"><?php echo wp_kses_post( $contact['right'] ); ?></div>
			</div>

			<div class="p-40 border-t">
				<img class="block mx-auto" src="<?php echo esc_attr( $logo['src'] ); ?>" alt="<?php echo esc_attr( $logo['alt'] ); ?>" />
			</div>

		</footer>

	</div>

	<div id="wp-footer"><?php wp_footer(); ?></div>

</body>
</html>
