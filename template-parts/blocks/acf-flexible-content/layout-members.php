<?php
/**
 * Template part for Members layout 
 */

?>

<?php $list = get_sub_field('List'); 
$caption = get_sub_field('caption'); ?>
<?php if ($caption): ?>
	<header class="page-header">
		<div class="container-fluid">
			<h2><?php echo $caption ?></h2>
		</div>
	</header><!-- / page-header -->
<?php endif ?>

<?php if ($list): ?>
<ul class="member-list">
	<?php foreach ($list as $key => $item): ?>
		<li>
			<div class="hold">
				<?php

				$link_html = '<a href="#">';

				if ($item['add_link']) {
					if ($item['link']['external_link']) {
						$link_html = '<a class="link-to" href="'.$item['link']['url'].'" target="_blank">';
					} else {
						$link_html = '<a class="link-to" href="'.$item['link']['page_link'].'">';
					}
				} ?>
				<?php echo $link_html; ?><?php echo $item['title'] ?></a>
				<?php if ($item['text'] ): ?>					
					<div class="descr">
						<div class="descr-in">
							<?php echo $item['text'] ?>
						</div>
					</div>					
				<?php endif ?>
				
			</div>
		</li>	
	<?php endforeach ?>
</ul><!-- / member-list -->
<?php endif ?>