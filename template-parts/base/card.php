<?php

$bg_color = array(
  'post' => 'bg-blue',
  'talent' => 'bg-yellow',
  'tribe_events' => 'bg-purple',
  'resources' => 'bg-red',
);

$is_post_new = function () {
  $post_date = get_the_date( 'U' );
  $current_date = current_time( 'timestamp' );
  $days = floor( ($current_date - $post_date) / ( 60 * 60 * 24 ) );
  return $days <= 7;
};

?>


<a class="grid grid-cols-1 rounded-2xl overflow-hidden no-underline" href="<?php the_permalink(); ?>">
  <div class="relative">
    <?php if ( $is_post_new() ) : ?>
      <div class="z-10 absolute m-4 ddp-button font-semibold <?php echo $bg_color[get_post_type()]; ?>">New!</div>
    <?php endif; ?>
    <figure class="aspect-w-4 aspect-h-3 bg-black">
      <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full object-cover opacity-70' ) ); ?>
    </figure>
  </div>
  <div class="grid items-end px-6 py-5 <?php echo $card['theme'] ?: 'bg-white'; ?>">
    <p class="text-xl font-semibold line-clamp-1"><?php the_title(); ?></p>
    <!-- <p class="text-xl font-regular line-clamp-1"><?php the_title(); ?></p> -->
  </div>
</a>
