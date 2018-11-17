<?php
/**
 * Template part for Visual intro layout 
 */

?>
<article class="info-section">
	<?php $slider = get_sub_field('slider') ?>
	<div class="base-col">		
		<?php if ($slider['images']): ?>			
			<div class="intro-slider">
				<?php foreach ($slider['images'] as $key => $image): ?>
					<div class="slide-item">
						<figure><img src="<?php echo $image['sizes']['container-thumbnails']; ?>" alt="<?php echo $image['alt']; ?>"></figure>
					</div><!-- / slide-item -->			
				<?php endforeach ?>					
			</div><!-- / instro-slider -->			
		<?php endif ?>
		<?php if ($slider['caption']): ?>			
			<div class="notice">
				<p><?php echo $slider['caption'] ?></p>
			</div>			
		<?php endif ?>			
	</div><!-- / base-col -->
	<?php $content = get_sub_field('content') ?>
	<?php if ($content): ?>
		
		<div class="col" <?php echo (($content['page_link']) ? 'data-link-href="'. $content['page_link'].'"': ''); ?>>
			<?php if ($content['title']): ?>				
				<header class="heading">
					<h1><?php echo $content['title'] ?></h1>
				</header>				
			<?php endif ?>
			
			<?php echo $content['text'] ?>
		</div><!-- / col -->
		
	<?php endif ?>
	
</article><!-- / info-section -->