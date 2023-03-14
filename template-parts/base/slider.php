<?php

?>


<?php if ( array_key_exists( 'slides', $slider ) && $slider['slides'] ) : ?>

<div
  class="swiper w-full <?php echo esc_attr( $slider['class'] ?: '' ); ?>"
  style="--swiper-theme-color: #fff; --swiper-navigation-sides-offset: 2rem; --swiper-navigation-size: 2rem;"
>
  <?php if ( count( $slider['slides'] ) > 1 ) : ?>
    <?php if ( array_key_exists( 'pagination', $slider ) ? $slider['pagination'] : true ) : ?>
      <div class="swiper-pagination"></div>
    <?php endif ?>
    <?php if ( array_key_exists( 'navigation', $slider ) ? $slider['navigation'] : true ) : ?>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    <?php endif ?>
    <?php if ( array_key_exists( 'scrollbar', $slider ) ? $slider['scrollbar'] : false ) : ?>
      <div class="swiper-scrollbar"></div>
    <?php endif ?>
  <?php endif ?>

  <div class="swiper-wrapper w-full">
    <?php foreach ( $slider['slides'] as $key => $slide ) : ?>

      <div class="swiper-slide w-full">
        <?php set_query_var( 'slide', $slide ); ?>
        <?php get_template_part( array_key_exists( 'component', $slider ) ? $slider['component'] : null ); ?>
      </div>

    <?php endforeach ?>
  </div>
</div>

<?php endif ?>
