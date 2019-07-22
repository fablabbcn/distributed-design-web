<?php $images = get_sub_field( 'image' ); ?>


<?php if ( $images ) : ?>
	<div class="post-slider max-h-screen -m-20 lg:-mx-40">
		<?php foreach ( $images as $image ) : ?>
			<?php
			$focal_point = get_post_meta( $image['ID'], '_wpsmartcrop_image_focus' );
			$media_attrs = array(
				'style' => $focal_point ? "object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%" : '',
				'class' => 'block w-full h-full max-h-screen object-cover',
			);
			?>

			<figure class="">
				<?php echo wp_get_attachment_image( $image['ID'], 'container-thumbnails', false, $media_attrs ); ?>
			</figure>

		<?php endforeach; ?>
	</div>
<?php endif; ?>
