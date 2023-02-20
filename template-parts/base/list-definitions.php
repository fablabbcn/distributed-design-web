<?php

?>


<dl class="grid grid-cols-5 gap-4">
  <header class="col-span-2 py-6 border-y">
    <p class="text-2xl"><?php echo esc_html( $list['title'] ); ?></p>
  </header>

  <div class="col-span-3 py-6 border-y grid gap-8">
    <?php if ( array_key_exists( 'items', $list ) && $list['items'] ) : ?>
      <ol class="columns-2 [column-gap-[1rem]] space-y-3">
        <?php foreach ( $list['items'] as $key => $item ) : ?>
          <li class="text-xl leading-none"><?php echo esc_html( $item ); ?></li>
        <?php endforeach; ?>
      </ol>
    <?php endif; ?>

    <?php if ( array_key_exists( 'button', $list ) && $list['button'] ) : ?>
      <div class="">
        <?php set_query_var( 'button', $list['button'] ); ?>
        <?php get_template_part( 'template-parts/base/button' ); ?>
      </div>
    <?php endif; ?>
  </div>
</dl>
