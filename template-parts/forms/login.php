<?php

$login_url = wp_lostpassword_url( get_permalink() );

?>


<fieldset class="w-full mb-20">

	<p class="mb-20 text-16 md:text-22 font-oswald font-medium md:text-center uppercase">Log In</p>

	<input name="username" id="username" class="<?php echo esc_attr( $form_classes['input'] ); ?> -mb-border"
		type="text" placeholder="Username or Email" autocomplete="current-email">

	<input name="password" id="password" class="<?php echo esc_attr( $form_classes['input'] ); ?> -mb-border"
		type="password" placeholder="Password" autocomplete="current-password">

	<p class="mt-10 md:mt-25 text-12 md:text-16 md:text-center">
		<a class="underline" href="<?php echo esc_attr( $login_url ); ?>">Forgot your password?</a>
	</p>

</fieldset>
