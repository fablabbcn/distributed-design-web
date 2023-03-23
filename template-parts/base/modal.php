<div class="z-[999] fixed inset-0 flex justify-center items-center w-screen h-screen p-8">
  <div
    class="z-10 absolute inset-0 w-full h-full bg-black/50"
    @click="isOpen = !isOpen"
  ></div>

  <div
    class="z-20 relative grid lg:grid-cols-7 gap-8 max-w-3xl p-8 lg:p-12 bg-white rounded-2xl overflow-hidden"
    x-show="isOpen"
    x-transition
  >
    <div class="absolute top-0 right-0 m-4 lg:m-8">
      <button class="flex p-2" @click="isOpen = !isOpen" aria-label="Close modal">
        <svg class="w-6 h-6 lg:w-8 lg:h-8 fill-none stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.92 38.92">
          <path d="M1 37.92 37.92 1m0 36.92L1 1" style="stroke-linecap:round;stroke-linejoin:round;stroke-width:2px"/>
        </svg>
      </button>
    </div>

    <header class="col-span-full lg:col-span-2">
      <p class="text-2xl"><?php echo esc_html( $modal['label'] ); ?></p>
    </header>

    <div class="col-span-full lg:col-span-4 grid gap-6">
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
