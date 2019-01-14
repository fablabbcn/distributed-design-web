<?php

$default_classes = array(
	'div'   => $form_classes['input_container'],
	'label' => $form_classes['label'],
	'input' => $form_classes['input'],
);

$inputs = array(
	array(
		'label'   => 'Organization',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Name',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Profession',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Project Name',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Link',
		'type'    => 'url',
		'classes' => $default_classes,
	),
);

?>


<?php $field_id = "$post_type-title"; ?>
<div class="<?php echo esc_attr( $form_classes['input_container'] ); ?>">
	<p class="<?php echo esc_attr( $form_classes['label'] ); ?>">Select Title</p>

	<div class="<?php echo esc_attr( $form_classes['radio_container'] ); ?>">
		<input type="radio" id="<?php echo esc_attr( $field_id ); ?>-designer" name="<?php echo esc_attr( $field_id ); ?>" value="designer" class="clip">
		<label for="<?php echo esc_attr( $field_id ); ?>-designer" class="<?php echo esc_attr( $form_classes['radio'] ); ?>">Designer</label>

		<input type="radio" id="<?php echo esc_attr( $field_id ); ?>-maker" name="<?php echo esc_attr( $field_id ); ?>" value="maker" class="clip">
		<label for="<?php echo esc_attr( $field_id ); ?>-maker" class="<?php echo esc_attr( $form_classes['radio'] ); ?>">Maker</label>

		<input type="radio" id="<?php echo esc_attr( $field_id ); ?>-team" name="<?php echo esc_attr( $field_id ); ?>" value="team" class="clip">
		<label for="<?php echo esc_attr( $field_id ); ?>-team" class="<?php echo esc_attr( $form_classes['radio'] ); ?>">Team</label>
	</div>

</div>


<?php

foreach ( $inputs as $key => $input ) {
	set_query_var( 'input', $input );
	get_template_part( 'template-parts/forms/-input' );
}
