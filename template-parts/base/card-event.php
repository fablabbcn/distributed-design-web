<?php

setup_postdata( $post );

$date_start = tribe_get_start_date( null, false, 'd M' );
$date_end   = tribe_get_end_date( null, false, 'd M' );

$city = tribe_get_venue_object( $post )->city;

?>


<div class="relative grid grid-cols-1 gap-4 bg-purple rounded-2xl overflow-hidden">
  <div class="aspect-w-1 aspect-h-1 md:aspect-w-3 md:aspect-h-2 lg:aspect-w-4 lg:aspect-h-3">
    <figure class="bg-black rounded-2xl overflow-hidden">
      <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full object-cover opacity-70' ) ); ?>
    </figure>
  </div>
  <div class="absolute inset-0 w-full h-full grid items-end p-4 text-white text-center">
    <p class="text-2xl font-bold line-clamp-3"><?php the_title(); ?></p>
    <div class="grid">
      <?php set_query_var( 'button', array( 'label' => $date_start !== $date_end ? "{$date_start} – {$date_end}, {$city}" : "$date_start, {$city}" ) ); ?>
      <?php get_template_part( 'template-parts/base/button' ); ?>
    </div>
  </div>
</div>
