<?php

if ( have_rows( 'flexible_content', get_option( 'page_on_front' ) ) ) :
	while ( have_rows( 'flexible_content', get_option( 'page_on_front' ) ) ) :
		the_row();
		set_query_var( 'layout', $layout );
		get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'logos' );
	endwhile;
endif;
