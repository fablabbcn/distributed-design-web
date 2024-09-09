<?php
$thumbnail_id    = get_field( 'featured_alt', $slide['post']->ID ) ?: get_post_thumbnail_id( $slide['post']->ID );
$focal_point     = get_post_meta( $thumbnail_id, '_wpsmartcrop_image_focus' );
$thumbnail_attrs = array(
  'class' => '!w-full !h-full object-cover opacity-70',
  'style' => $focal_point ? "object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%;" : '',
);

if($slide['button']){
  $button = array(
    'label' => $slide['button'],
    'href' => get_permalink( $slide['post']->ID ),
    'theme' => 'text-black bg-white',
  );
} else {
  $button = '';
}


$subtitle = get_field( 'archive_titles', 'options' )
  ? get_field( 'archive_titles', 'options' )[ get_post_type() ]
  : null;

?>


<div class="relative flex flex-col gap-4 w-full h-full bg-yellow max-h-[70vh]">
  <div class="h-full">
    <figure class="aspect-w-4 aspect-h-3 lg:aspect-none bg-black lg:h-[70vh]">
      <?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false, $thumbnail_attrs ); ?>
    </figure>
  </div>
  <div class="container absolute inset-0 grid-layout w-full h-full px-20 lg:px-8 py-12">
    <div class="col-span-full lg:col-start-3 lg:col-end-6 flex flex-col justify-center items-center gap-2 w-full h-full text-white text-center">
      <div class="_mt-auto">
        <div class="text-base lg:text-lg font-semibold line-clamp-1 uppercase"><?php echo $subtitle; ?></div>
      </div>
      <div class="_mb-auto">
        <a class="no-underline" href="<?php echo get_the_permalink( $slide['post']->ID ); ?>">
          <p class="text-2xl lg:text-4xl font-semibold line-clamp-3 [text-wrap:balance]"><?php echo get_the_title( $slide['post']->ID ); ?></p>
        </a>
      </div>
      <?php if($button): ?>
        <div class="mt-4 lg:mt-8">
          <?php set_query_var( 'button', $button ); ?>
          <?php get_template_part( 'template-parts/base/button' ); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
