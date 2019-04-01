<?php

if ( have_rows( 'flexible_content', get_option( 'page_on_front' ) ) ) :
	while ( have_rows( 'flexible_content', get_option( 'page_on_front' ) ) ) :
		the_row();
		get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'logos' );
	endwhile;
endif;
