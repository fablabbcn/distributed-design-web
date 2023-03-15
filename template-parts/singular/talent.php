<?php

?>


<div class="flex flex-col gap-2 col-span-2 pr-8">
  <figure class="mb-2 aspect-w-1 aspect-h-1 bg-black/10 rounded-2xl overflow-hidden">
    <?php echo wp_get_attachment_image( get_field( 'image' ), 'post-list-thumbnails-square', false, array( 'class' => 'w-full h-full object-cover' ) ); ?>
  </figure>

  <div class="mb-6">
    <p class="text-xl font-semibold"><?php the_field( 'name' ); ?></p>
  </div>

  <div class="mb-auto"></div>

  <?php foreach ( get_field( 'buttons' ) ?: array() as $button ) : ?>
    <?php if ( $button['url'] ) : ?>
      <?php set_query_var( 'button', array( 'label' => $button['label'] ?: $button['url'], 'href' => $button['url'] ) ); ?>
      <?php get_template_part( 'template-parts/base/button' ); ?>
    <?php endif; ?>
  <?php endforeach; ?>

  <div class="">
    <?php $social_links = get_field( 'social_media' )['links']; ?>
    <?php require locate_template( 'template-parts/blocks/social-links.php' ); ?>
  </div>
</div>

<div class="col-span-3">
  <?php set_query_var( 'list', $definitions ); ?>
  <?php get_template_part( 'template-parts/base/list-definitions' ); ?>
</div>
