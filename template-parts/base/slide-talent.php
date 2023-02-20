<?php
// global $post;

// var_dump( get_the_ID() );
// setup_postdata( $slide->ID );
// var_dump( get_the_ID() );
// var_dump( $slide->ID );

?>


<div class="relative grid grid-cols-1 gap-4 bg-yellow">
  <div class="">
    <figure class="aspect-w-16 aspect-h-9 bg-black">
      <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full object-cover opacity-70' ) ); ?>
    </figure>
  </div>
  <div class="absolute inset-0 w-full h-full grid items-center p-4 text-white text-center">
    <p class="text-2xl font-semibold line-clamp-3"><?php the_title(); ?></p>
  </div>
</div>
