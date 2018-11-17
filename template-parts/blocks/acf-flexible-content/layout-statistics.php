<?php
/**
 * Template part for Statistics layout 
 */

?>

<?php $items = get_sub_field('items'); 
$caption = get_sub_field('caption'); ?>
<?php if ($caption): ?>	
	<header class="page-header">
		<div class="container-fluid">
			<h2><?php echo $caption ?></h2>
		</div>
	</header><!-- / page-header -->
<?php endif ?>

<?php if ($items): ?>
<div class="statistics active">
	<div class="col">
		<div class="tab-content">
			<div class="tab-pane active" role="tabpanel" id="tabs-first">
				<a href="#" class="btn-close"><span class="sr-only">mobile tab close</span></a>
				<div class="holder">
					<?php the_sub_field('description'); ?>
				</div>
			</div><!-- / tab-pane -->
				
			<?php foreach ($items as $key => $item): ?> <?php /*echo (($key == 0) ? 'active' : '') */?>
				<div class="tab-pane" role="tabpanel" id="tabs-0<?php echo $layout ?>-0<?php echo $key ?>">
					<header class="heading">
						<h2><?php echo $item['title'] ?></h2>
					</header>
					<a href="#" class="btn-close"><span class="sr-only">mobile tab close</span></a>
					<div class="holder">
						<?php echo $item['text'] ?>
					</div>
				</div><!-- / tab-pane -->
			<?php endforeach ?>
		</div><!-- / tab-content -->
	</div><!-- / col -->
	<ul class="nav tabset" role="tablist">
		<?php foreach ($items as $key => $item): if($item['number']): ?> <?php /*echo (($key == 0) ? 'class="active"' : '')*/ ?>

			<li role="presentation"><a href="#tabs-0<?php echo $layout ?>-0<?php echo $key ?>" aria-controls="tabs-0<?php echo $layout ?>-0<?php echo $key ?>" role="tab" data-toggle="tab">
				<span class="small"><?php echo $item['title'] ?></span><span class="value"><?php echo $item['number'] ?></span>
			</a></li>
		<?php endif; endforeach ?>
	</ul>
</div><!-- / statistics -->
<?php endif ?>