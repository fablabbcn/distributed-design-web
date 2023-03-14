<?php

$button = array(
  'color' => array(
		'post' => 'bg-blue',
		'talent' => 'bg-yellow',
		'tribe_events' => 'bg-purple',
		'resources' => 'bg-red',
		'page' => 'bg-purple',
	)[ get_post_type() ]
);

?>


<a
  class="ddp-button <?php echo esc_attr( $button['color'] ); ?>"
  href="<?php echo esc_url( get_term_link( $term ) ); ?>"
>
  <?php echo esc_html( $term->name ); ?>
</a>
