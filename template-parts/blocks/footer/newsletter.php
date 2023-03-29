<?php

$footer_cta = get_field( 'footer_cta', 'options' );

$n_classes = array(
	'input'    => 'w-full px-4 py-2 text-black bg-white placeholder:text-black/50 text-base leading-none border border-white rounded-full',
	'checkbox' => 'text-sm leading-none',
);

?>


<div class="container grid-layout gap-y-8 lg:items-baseline">

	<div class="col-span-full lg:col-span-3">
		<div class="grid-layout grid-cols-[1fr_auto] lg:grid-cols-1 items-end lg:pr-16">
			<!-- <p class="text-4xl leading-none font-thin"><?php echo esc_html( $footer_cta['title'] ); ?></p> -->
			<p class="text-4xl leading-none font-extralight">Join our community!</p>
			<p class="text-xl leading-tight font-light">Sign up to our newsletter and stay updated on the latest Distributed Design news</p>
		</div>
	</div>

	<div class="col-span-full lg:col-span-4">
		<form data-ajaxchimp class="" method="POST"
			action="//fablabbcn.us2.list-manage.com/subscribe/post?u=d67ba8deb34a23a222ec4eb8a&id=9ece23d947">

			<div class="grid grid-cols-[1fr_auto] items-baseline gap-4">

				<div class="col-span-2">
					<input class="<?php the_classes( $n_classes['input'] ); ?>"
						placeholder="<?php echo esc_attr( $footer_cta['email_placeholder'] ); ?>"
						type="email" name="EMAIL" autocomplete="current-email" required>
				</div>

				<div class="">
					<label class="flex items-center">
						<input class="w-4 h-4 mx-4 text-black border-none rounded-sm" type="checkbox" name="gdpr[37]" required>
						<span class="<?php the_classes( $n_classes['checkbox'] ); ?>"><?php echo wp_kses_post( $footer_cta['acceptance_text'] ); ?></span>
					</label>
				</div>

				<div class="">
					<?php set_query_var( 'button', array( 'label' => $footer_cta['submit_label'], 'type' => 'submit' ) ); ?>
					<?php get_template_part( 'template-parts/base/button' ); ?>
				</div>

			</div>

		</form>
	</div>

</div>
