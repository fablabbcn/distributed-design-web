<?php

$label_classes = 'flex items-center w-full mb-0 -mr-border px-20 py-10 text-16 md:text-17 font-medium border';

?>


<div class="<?php echo esc_attr( $form_classes['input_container'] ); ?>">
	<label for="" class="<?php echo esc_attr( $form_classes['label'] ); ?>">Event Title</label>
	<input type="text" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?>">
</div>

<div class="<?php echo esc_attr( $form_classes['input_container'] ); ?>">
	<label for="" class="<?php echo esc_attr( $form_classes['label'] ); ?>">Organization</label>
	<input type="text" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?>">
</div>

<div class="<?php echo esc_attr( $form_classes['input_container'] ); ?>">
	<label for="" class="<?php echo esc_attr( $form_classes['label'] ); ?>">Date</label>
	<input type="date" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?>">
</div>

<div class="<?php echo esc_attr( $form_classes['input_container'] ); ?>">
	<label for="" class="<?php echo esc_attr( $form_classes['label'] ); ?>">Link</label>
	<input type="url" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?>">
</div>


<div class="flex flex-col w-full mb-20 px-10">
	<p class="<?php echo esc_attr( $form_classes['label'] ); ?>">Statistics · Number of audience</p>

	<div class="flex -mx-10">

		<div class="flex w-full px-10">
			<label for="" class="<?php echo esc_attr( $label_classes ); ?>">Creative Talent</label>
			<input type="number" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?> text-center">
		</div>

		<div class="flex w-full px-10">
			<label for="" class="<?php echo esc_attr( $label_classes ); ?>">Local Audience</label>
			<input type="number" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?> text-center">
		</div>

		<div class="flex w-full px-10">
			<label for="" class="<?php echo esc_attr( $label_classes ); ?>">Social Media Audience</label>
			<input type="number" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?> text-center">
		</div>

	</div>

</div>


<div class="<?php echo esc_attr( $form_classes['input_container'] ); ?>">
	<label for="" class="<?php echo esc_attr( $form_classes['label'] ); ?>">Location</label>
	<input type="text" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?>">
</div>

<div class="<?php echo esc_attr( $form_classes['input_container'] ); ?>">
	<label for="" class="<?php echo esc_attr( $form_classes['label'] ); ?>">Time</label>
	<input type="time" name="" id="" class="<?php echo esc_attr( $form_classes['input'] ); ?>">
</div>
