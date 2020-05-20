<?php

$footer_cta = get_field( 'footer_cta', 'options' );

$n_classes = array(
	'input'    => 'w-full p-10 lg:p-20 text-16 bg-white border',
	'submit'   => 'w-full p-10 lg:p-20 text-white hocus:text-black bg-black hocus:bg-primary font-oswald font-medium uppercase border border-black',
	'checkbox' => 'flex items-center w-full font-normal',
);

?>


<div class="md:flex justify-between items-center -mt-border px-15 py-40 lg:px-40 border-t">

	<div class="font-oswald font-bold uppercase">
		<p><?php echo esc_html( $footer_cta['title'] ); ?></p>
	</div>

	<div class="w-full mt-20 md:mt-0">
		<form data-ajaxchimp class="flex flex-wrap" method="POST"
			action="//fablabbcn.us2.list-manage.com/subscribe/post?u=d67ba8deb34a23a222ec4eb8a&id=9ece23d947">

			<span class="relative flex w-full md:w-2/3">
				<input class="<?php the_classes( $n_classes['input'] ); ?>"
					placeholder="<?php echo esc_attr( $footer_cta['email_placeholder'] ); ?>"
					type="email" name="EMAIL" autocomplete="current-email" required>
			</span>

			<span class="relative flex w-full md:w-1/3 -mt-border lg:mt-0 lg:-ml-border">
				<button class="<?php the_classes( $n_classes['submit'] ); ?>" type="submit">
					<?php echo esc_html( $footer_cta['submit_label'] ); ?>
				</button>
			</span>

			<span class="relative flex w-full mt-20 lg:mt-10">
				<label class="mb-0">
					<input class="clip" type="checkbox" name="gdpr[37]" required>
					<span class="<?php the_classes( $n_classes['checkbox'] ); ?>"><?php echo wp_kses_post( $footer_cta['acceptance_text'] ); ?></span>
				</label>
			</span>

		</form>
	</div>

</div>
