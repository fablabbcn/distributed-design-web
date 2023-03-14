<?php
// global $post;

// var_dump( get_the_ID() );
// setup_postdata( $slide->ID );
// var_dump( get_the_ID() );
// var_dump( $slide->ID );

$post = $slide;
setup_postdata( $post );

?>


<div class="relative grid grid-cols-1 gap-4 bg-yellow">
  <div class="">
    <figure class="aspect-w-16 aspect-h-9 bg-black">
      <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full object-cover opacity-70' ) ); ?>
    </figure>
  </div>
  <div class="absolute inset-0 w-full h-full flex flex-col items-center px-20 py-12 text-white text-center">
    <div class="my-auto">
      <p class="text-2xl font-semibold line-clamp-3"><?php the_title(); ?></p>
    </div>
    <div class="text-black bg-white rounded-full">
      <?php set_query_var( 'button', array( 'label' => 'Learn more' ) ); ?>
      <?php get_template_part( 'template-parts/base/button' ); ?>
    </div>
  </div>
</div>
