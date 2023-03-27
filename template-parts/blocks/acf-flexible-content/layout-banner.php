<?php

$title = get_sub_field( 'title' );
$description = get_sub_field( 'description' );

$styles = get_sub_field( 'styles' );

?>


<aside class="relative grid-layout -mt-4 py-4 text-white <?php echo esc_attr( $styles['bg_color'] ?: 'bg-indigo' ); ?>">
  <div class="-z-10 absolute inset-0 bleed bg-[inherit]"></div>

  <div class="col-span-full lg:col-start-2 lg:col-end-7 flex justify-center items-center py-8 lg:p-16">
    <div class="flex flex-col text-3xl leading-tight [&_br]:hidden <?php echo esc_attr( $styles['font_weight'] ?: 'font-thin' ); ?>">
      <?php echo wp_kses_ddmp( $description ); ?>
    </div>
  </div>
</aside>
