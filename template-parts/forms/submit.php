<fieldset class="<?php echo esc_attr( $form_classes['fieldset'] ); ?>">
	<div class="flex flex-wrap -mx-10">

		<?php get_template_part( 'template-parts/forms/submit-' . $post_type ); ?>
		<?php get_template_part( 'template-parts/forms/submit-common' ); ?>

	</div>
</fieldset>
