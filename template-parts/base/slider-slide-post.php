<?php

$thumbnail_id    = get_field( 'featured_alt', $slide->ID ) ?: get_post_thumbnail_id( $slide->ID );
$focal_point     = get_post_meta( $thumbnail_id, '_wpsmartcrop_image_focus' );
$thumbnail_attrs = array(
  'class' => 'w-full h-full lg:!w-full lg:!h-full max-h-[70vh] object-cover opacity-70',
  'style' => $focal_point ? "object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%;" : '',
);

$button = array(
  'label' => 'Read more',
  'href' => get_permalink( $slide->ID ),
  'theme' => 'text-black bg-white',
);

?>


<div class="relative grid grid-cols-1 gap-4 bg-yellow">
  <div class="">
    <figure class="aspect-w-16 aspect-h-9 lg:aspect-none bg-black lg:h-[70vh]">
      <?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false, $thumbnail_attrs ); ?>
    </figure>
  </div>
  <div class="container absolute inset-0 grid-layout w-full h-full px-20 lg:px-8 py-12">
    <div class="col-span-full lg:col-start-3 lg:col-end-6 flex flex-col items-center w-full h-full text-white text-center">
      <div class="my-auto">
        <p class="text-2xl lg:text-3xl font-semibold line-clamp-3"><?php echo get_the_title( $slide->ID ); ?></p>
      </div>
      <div class="">
        <?php set_query_var( 'button', $button ); ?>
        <?php get_template_part( 'template-parts/base/button' ); ?>
      </div>
    </div>
  </div>
</div>
