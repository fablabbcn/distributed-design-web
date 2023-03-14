<?php

?>


<?php if ( array_key_exists( 'items', $list ) && $list['items'] ) : ?>
	<dl class="grid divide-y border-y">

		<?php foreach ( $list['items'] as $key => $item ) : ?>
			<div class="grid md:grid-cols-[2fr_4fr] py-2 [&>dd]:font-semibold">

				<?php foreach ( $item['terms'] as $key => $term ) : ?>
					<dt class="uppercase text-xs tracking-wide"><?php echo $term; ?></dt>
				<?php endforeach; ?>

				<?php foreach ( $item['definitions'] as $key => $definition ) : ?>
					<?php switch ( gettype( $definition ) ) : ?><?php
						case 'array' : ?>
							<dd class="flex flex-wrap gap-x-4 gap-y-1">
								<?php foreach ( $definition as $key => $d ) : ?>
									<a href="<?php echo esc_url( $d['href'] ); ?>"><?php echo esc_html( $d['label'] ); ?></a>
								<?php endforeach; ?>
							</dd>
							<?php break;
						default : ?>
							<dd><?php echo $definition; ?></dd>
							<?php break; ?>
					<?php endswitch; ?>
				<?php endforeach; ?>

			</div>
		<?php endforeach; ?>

	</dl>
<?php endif; ?>
