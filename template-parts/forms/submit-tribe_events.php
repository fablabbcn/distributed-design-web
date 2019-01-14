<?php

$label_classes = 'flex items-center w-full mb-0 -mr-border px-20 py-10 text-16 md:text-17 font-medium border';

$default_classes = array(
	'div'   => $form_classes['input_container'],
	'label' => $form_classes['label'],
	'input' => $form_classes['input'],
);

$first_inputs = array(
	array(
		'label'   => 'Event Title',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Organization',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Date',
		'type'    => 'date',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Link',
		'type'    => 'url',
		'classes' => $default_classes,
	),
);

$second_inputs = array(
	array(
		'label'   => 'Location',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Time',
		'type'    => 'time',
		'classes' => $default_classes,
	),
);


foreach ( $first_inputs as $key => $input ) {
	set_query_var( 'input', $input );
	get_template_part( 'template-parts/forms/-input' );
}


?>


<div class="flex flex-col w-full mb-20 px-10">
	<p class="<?php echo esc_attr( $form_classes['label'] ); ?>">Statistics · Number of audience</p>

	<div class="flex -mx-10">

		<?php $field_id = "$form_id-creative-talent"; ?>
		<div class="flex w-full px-10">
			<label for="<?php echo esc_attr( $field_id ); ?>" class="<?php echo esc_attr( $label_classes ); ?>">Creative Talent</label>
			<input type="number" name="<?php echo esc_attr( $field_id ); ?>" id="<?php echo esc_attr( $field_id ); ?>"
				class="<?php echo esc_attr( $form_classes['input'] ); ?> text-center">
		</div>

		<?php $field_id = "$form_id-local-audience"; ?>
		<div class="flex w-full px-10">
			<label for="<?php echo esc_attr( $field_id ); ?>" class="<?php echo esc_attr( $label_classes ); ?>">Local Audience</label>
			<input type="number" name="<?php echo esc_attr( $field_id ); ?>" id="<?php echo esc_attr( $field_id ); ?>"
				class="<?php echo esc_attr( $form_classes['input'] ); ?> text-center">
		</div>

		<?php $field_id = "$form_id-social-media-audience"; ?>
		<div class="flex w-full px-10">
			<label for="<?php echo esc_attr( $field_id ); ?>" class="<?php echo esc_attr( $label_classes ); ?>">Social Media Audience</label>
			<input type="number" name="<?php echo esc_attr( $field_id ); ?>" id="<?php echo esc_attr( $field_id ); ?>"
				class="<?php echo esc_attr( $form_classes['input'] ); ?> text-center">
		</div>

	</div>

</div>


<?php

foreach ( $second_inputs as $key => $input ) {
	set_query_var( 'input', $input );
	get_template_part( 'template-parts/forms/-input' );
}
