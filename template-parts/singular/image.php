<figure class="">
	<img
		class="w-full object-cover rounded-2xl overflow-hidden"
		src="<?php get_sub_field( 'image' ) ? the_sub_field( 'image' ) : the_post_thumbnail_url(); ?>"
		alt=""
	>
</figure>
