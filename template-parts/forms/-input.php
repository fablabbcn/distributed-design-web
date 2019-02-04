<?php

$input['id']   = "$post_type-" . sanitize_title( $input['label'] );
$input['name'] = false === strpos( $input['attr'], 'multiple' ) ? $input['id'] : $input['id'] . '[]';

?>


<div class="<?php echo esc_attr( $input['classes']['div'] ); ?>">

	<label
		for="<?php echo esc_attr( $input['id'] ); ?>"
		class="<?php echo esc_attr( $input['classes']['label'] ); ?>"
	><?php echo esc_html( $input['label'] ); ?></label>

<?php if ( 'textarea' === $input['type'] ) : ?>
	<textarea
		cols="30" rows="16"
		name="<?php echo esc_attr( $input['name'] ); ?>"
		id="<?php echo esc_attr( $input['id'] ); ?>"
		class="<?php echo esc_attr( $input['classes']['input'] ); ?>"
		<?php echo esc_attr( $input['attr'] ); ?>
	></textarea>

<?php else : ?>
	<input
		type="<?php echo esc_attr( $input['type'] ); ?>"
		name="<?php echo esc_attr( $input['name'] ); ?>"
		id="<?php echo esc_attr( $input['id'] ); ?>"
		class="<?php echo esc_attr( $input['classes']['input'] ); ?>"
		<?php echo esc_attr( $input['attr'] ); ?>
	>
<?php endif; ?>

</div>
