<?php

$content = get_sub_field( 'content' );

?>


<section class="relative grid grid-cols-5 gap-4 py-4 text-white bg-indigo">
  <div class="-z-10 absolute inset-0 bleed bg-[inherit]"></div>

  <div class="col-span-full flex justify-center items-center py-8">
    <div class="flex flex-col text-3xl leading-tight font-thin [&_br]:hidden">
      <?php echo wp_kses_ddmp( $content ); ?>
    </div>
  </div>
</section>
