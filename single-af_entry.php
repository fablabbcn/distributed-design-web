<?php
/**
 * The template for displaying all single posts
 */

get_header();

// TODO: Fix whatever's messing global vars in The Event Calendar
$post = isset( $_post ) ? $_post : $post;

$s_classes = array(
	'section' => array( 'post-content rich-text relative' ),
	'layout'  => array( 'flex flex-wrap lg:flex-no-wrap' ),
	'columns' => function ( $has_details, $has_border = true ) {
		$base_classes = $has_border ? 'p-20 lg:p-40 border-t' : 'p-20 pt-0 lg:p-40 lg:pt-0';
		return array(
			array( 'relative', $has_details ? 'flex' : 'hidden', 'lg:flex flex-col w-full', $base_classes, 'lg:w-1/4' ),
			array( 'relative', $has_details ? 'flex' : 'hidden', 'lg:flex flex-col w-full', $base_classes, 'lg:w-3/4 lg:border-l' ),
			array( 'relative', 'hidden lg:flex flex-col w-full lg:w-auto', $base_classes, 'lg:border-l' ),
		);
	},
);

$fields = array(
	array( 'members', 'country' ),
	array( 'description_short', 'description_detailed', 'keywords' ),
	array( 'details' ),
	array( 'images', 'video' ),
	array( 'website', 'social_media' ),
);

?>


<main>
	<?php set_query_var( 'title', get_field( 'name' ) ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $post = isset( $_post ) ? $_post : $post; ?>

		<section class="<?php the_classes( $s_classes['section'] ); ?>">
			<div data-layout="hero" class="<?php the_classes( $s_classes['layout'] ); ?>">
				<div class="<?php the_classes( $s_classes['columns'](false)[0] ); ?>">&nbsp;</div>
				<div class="<?php the_classes( $s_classes['columns'](true)[1] ); ?>">
					<div class="absolute pin-b pin-l m-20 lg:m-40"><?php echo do_shortcode( '[wp_ulike]' ); ?></div>
					<div class="-m-20 lg:-m-40 flex-grow">
						<?php echo wp_get_attachment_image( get_field( 'images' )[0]['image']['ID'], 'post-thumbnail', false, array( 'class' => 'w-full' ) ); ?>
					</div>
				</div>
				<div class="<?php the_classes( $s_classes['columns'](true)[2] ); ?>"><?php include locate_template( 'template-parts/post/aside.php' ); ?></div>
			</div>
		</section>

		<?php foreach ( array_merge( ...$fields ) as $field ) : ?>
			<?php
				$get_field  = get_field( $field );
				$get_object = get_field_object( $field );
				$details    = array( 'heading' => $get_object['label'] );
			?>
			<?php if ( $get_field ) : ?>
				<section class="<?php the_classes( $s_classes['section'] ); ?>">
					<div data-layout="<?php echo esc_attr( get_row_layout() ); ?>" class="<?php the_classes( $s_classes['layout'] ); ?>">
						<div class="<?php the_classes( $s_classes['columns'](true)[0] ); ?>"><?php include locate_template( 'template-parts/singular/details.php' ); ?></div>
						<div class="<?php the_classes( $s_classes['columns'](true)[1] ); ?>">

							<?php if ( in_array( $field, array( 'country', 'keywords' ), true ) ) : ?>
								<p><?php echo wp_kses_post( $get_field ); ?></p>

							<?php elseif ( in_array( $field, array( 'description_short', 'description_detailed' ), true ) ) : ?>
								<?php echo wp_kses_post( $get_field ); ?>

							<?php elseif ( 'members' === $field ) : ?>
								<?php foreach ( $get_field as $key => $item ) : ?>
									<p><?php echo wp_kses_post( $item['name'] ); ?></p>
								<?php endforeach; ?>

							<?php elseif ( 'details' === $field ) : ?>
								<?php foreach ( $get_field as $key => $item ) : ?>
									<?php if ( $item['answer'] ) : ?>
										<dl>
											<dt><?php echo wp_kses_post( $get_object['sub_fields'][ substr( $key, -1 ) - 1 ]['sub_fields'][0]['message'] ); ?></dt>
											<dd><?php echo $item['text'] ? wp_kses_post( $item['text'] ) : '—'; ?></dd>
										</dl>
									<?php endif; ?>
								<?php endforeach; ?>

							<?php elseif ( 'images' === $field ) : ?>
								<?php foreach ( $get_field as $key => $item ) : ?>
									<p><img src="<?php echo wp_kses_post( $item['image']['url'] ); ?>" alt=""></p>
								<?php endforeach; ?>

							<?php elseif ( 'video' === $field ) : ?>
								<?php if ( strpos( $get_field, 'youtu' ) ) : ?>
									<?php $youtube_regex = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/"; ?>
									<?php $youtube_id = preg_match( $youtube_regex, $get_field, $matches); ?>
									<div class="relative aspect-ratio-16/9 w-full h-0">
										<iframe	class="absolute pin w-full h-full" src="https://www.youtube.com/embed/<?php echo esc_attr( $matches[1] ); ?>" title="YouTube video player"
											frame frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
								<?php elseif ( strpos( $get_field, 'vimeo' ) ) : ?>
									<?php $vimeo_regex = "/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/?(showcase\/)*([0-9))([a-z]*\/)*([0-9]{6,11})[?]?.*/"; ?>
									<?php $vimeo_id = preg_match( $vimeo_regex, $get_field, $matches); ?>
									<div class="relative aspect-ratio-16/9 w-full h-0">
										<iframe	class="absolute pin w-full h-full" src="https://player.vimeo.com/video/<?php echo esc_attr( $matches[6] ); ?>?title=0&byline=0&portrait=0" title="Vimeo video player"
											frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
									</div>
								<?php else : ?>
									<p><a href="<?php echo wp_kses_post( $get_field ); ?>" target="_blank"><?php echo wp_kses_post( $get_field ); ?></a></p>
								<?php endif; ?>

							<?php elseif ( 'contact_details' === $field ) : ?>
								<p><?php echo wp_kses_post( $get_field['name'] ); ?></p>
								<p><a href="mailto:<?php echo wp_kses_post( $get_field['email'] ); ?>" target="_blank"><?php echo wp_kses_post( $get_field['email'] ); ?></a></p>
								<p><a href="tel:<?php echo wp_kses_post( $get_field['phone'] ); ?>" target="_blank"><?php echo wp_kses_post( $get_field['phone'] ); ?></a></p>

							<?php elseif ( 'website' === $field ) : ?>
								<?php $prefix = ! strpos( $get_field, '//' ) ? '//' : ''; ?>
								<p><a href="<?php echo esc_url( $prefix . $get_field ); ?>" target="_blank"><?php echo wp_kses_post( $get_field ); ?></a></p>

							<?php elseif ( 'social_media' === $field ) : ?>
								<?php foreach ( $get_field as $key => $item ) : ?>
									<?php $prefix = ! strpos( $item['link'], '//' ) ? '//' : ''; ?>
									<?php if ( ! $prefix ) : ?>
										<p><a href="<?php echo esc_url( $prefix . $item['link'] ); ?>" target="_blank"><?php echo wp_kses_post( $item['link'] ); ?></a></p>
									<?php else : ?>
										<p><?php echo wp_kses_post( $item['link'] ); ?></p>
									<?php endif; ?>
								<?php endforeach; ?>

							<?php elseif ( 'acceptance' === $field ) : ?>
								<?php foreach ( $get_field as $key => $item ) : ?>
									<p><?php echo wp_kses_post( "$key: $item" ); ?></p>
								<?php endforeach; ?>

							<?php endif; ?>
						</div>
						<div class="<?php the_classes( $s_classes['columns'](false)[2] ); ?>">&nbsp;</div>
					</div>
				</section>
			<?php endif; ?>
		<?php endforeach; ?>

	<?php endwhile; ?>

</main>


<?php get_footer(); ?>
