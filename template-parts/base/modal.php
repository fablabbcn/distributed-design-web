<div class="z-[999] fixed inset-0 flex justify-center items-center w-screen h-screen p-8">
  <div
    class="z-10 absolute inset-0 w-full h-full bg-black/50"
    @click="isOpen = !isOpen"
  ></div>

  <div
    class="z-20 relative grid gap-8 p-8 bg-white rounded-2xl overflow-hidden"
    x-show="isOpen"
    x-transition
  >
    <div class="absolute top-0 right-0 m-4">
      <button @click="isOpen = !isOpen">close</button>
    </div>

    <header>
      <p class="text-2xl"><?php echo esc_html( $modal['label'] ); ?></p>
    </header>

    <div class="grid gap-6">
      <div class="rich-text"><?php echo wp_kses_ddmp( $modal['description'] ); ?></div>
      <?php if ( array_key_exists( 'button', $modal ) && $modal['button']['label'] ) : ?>
        <div class="">
          <?php set_query_var( 'button', $modal['button'] ); ?>
          <?php get_template_part( 'template-parts/base/button' ); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
