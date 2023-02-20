<?php

?>


<button
  class="w-auto min-h-[2.5rem] px-6 py-2 uppercase bg-transparent text-center text-sm leading-none border border-current rounded-full"
  type="<?php echo esc_attr( $button['type'] ?? 'button' ); ?>"
>
  <?php echo esc_html( $button['label'] ); ?>
</button>
