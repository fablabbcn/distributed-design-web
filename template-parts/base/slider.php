<?php

?>


<?php if ( array_key_exists( 'slides', $slider ) && $slider['slides'] ) : ?>

<div
  class="swiper w-full <?php echo esc_attr( $slider['class'] ?: '' ); ?>"
  style="--swiper-theme-color: #fff; --swiper-navigation-sides-offset: 2rem; --swiper-navigation-size: 2rem;"
>
  <div class="swiper-pagination"></div>

  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- <div class="swiper-scrollbar"></div> -->

  <div class="swiper-wrapper w-full">
    <?php foreach ( $slider['slides'] as $key => $slide ) : ?>

      <div class="swiper-slide w-full">
        <?php
          $post = $slide;
          setup_postdata( $post );
          $component = array_key_exists( 'component', $slider ) ? $slider['component'] : null;
        ?>
        <?php set_query_var( 'slide', $slide ); ?>
        <?php get_template_part( $component ); ?>
      </div>

    <?php endforeach ?>
  </div>
</div>

<?php endif ?>
