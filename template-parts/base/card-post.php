<div class="grid grid-cols-5 gap-4">
  <div class="col-span-2">
    <figure class="aspect-w-1 aspect-h-1 bg-black rounded-2xl overflow-hidden">
      <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full object-cover' ) ); ?>
    </figure>
  </div>
  <div class="col-span-3">
    <div class="grid grid-cols-3 grid-rows-[auto_1fr] items-end gap-4 h-full py-4 border-t">
      <p class="col-span-2 -mr-4 text-xl line-clamp-3"><?php the_title(); ?></p>
      <p class="col-span-2 text-sm uppercase"><?php the_date( 'd F Y' ); ?></p>
      <div class="ml-auto">
        <button class="flex justify-center items-center w-10 h-10 p-2 text-center border rounded-full">
          <svg class="fill-none stroke-current stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.48 40.41">
            <path d="M21.13 39.67c0-19.46 17.6-19.46 17.6-19.46s-17.6 0-17.6-19.46M.75 20.24l37.98-.03" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>
