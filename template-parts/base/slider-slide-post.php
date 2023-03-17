<?php
// global $post;

// var_dump( get_the_ID() );
// setup_postdata( $slide->ID );
// var_dump( get_the_ID() );
// var_dump( $slide->ID );

// $post = $slide;
// setup_postdata( $post );

$thumbnail_id    = get_field( 'featured_alt', $slide->ID ) ?: get_post_thumbnail_id( $slide->ID );
$focal_point     = get_post_meta( $thumbnail_id, '_wpsmartcrop_image_focus' );
$thumbnail_attrs = array(
  'class' => 'w-full h-full object-cover opacity-70',
  'style' => $focal_point ? "object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%;" : '',
);

?>


<div class="relative grid grid-cols-1 gap-4 bg-yellow">
  <div class="">
    <figure class="aspect-w-16 aspect-h-9 bg-black">
      <?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false, $thumbnail_attrs ); ?>
    </figure>
  </div>
  <div class="absolute inset-0 w-full h-full flex flex-col items-center px-20 py-12 text-white text-center">
    <div class="my-auto">
      <p class="text-2xl font-semibold line-clamp-3"><?php echo get_the_title( $slide->ID ); ?></p>
    </div>
    <div class="text-black bg-white rounded-full">
      <?php set_query_var( 'button', array( 'label' => 'Read more', 'href' => get_permalink( $slide->ID ) ) ); ?>
      <?php get_template_part( 'template-parts/base/button' ); ?>
    </div>
  </div>
</div>
