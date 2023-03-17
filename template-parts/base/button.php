<?php

$is_link = isset( $button['href'] );

?>


<?php if ( $is_link ) : ?>
  <a
    class="ddp-button"
    href="<?php echo esc_attr( $button['href'] ); ?>"
    target="<?php echo esc_attr( $button['target'] ?? '_self' ); ?>"
  >
    <?php echo esc_html( $button['label'] ); ?>
  </a>

<?php else : ?>
  <button
    class="ddp-button"
    type="<?php echo esc_attr( $button['type'] ?? 'button' ); ?>"
  >
    <?php echo esc_html( $button['label'] ); ?>
  </button>

<?php endif; ?>
