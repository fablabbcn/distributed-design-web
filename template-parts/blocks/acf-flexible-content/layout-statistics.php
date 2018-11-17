<?php
/**
 * Template part for Statistics layout
 */

$items   = get_sub_field( 'items' );
$caption = get_sub_field( 'caption' );

?>


<?php if ( $caption ) : ?>
	<header class="page-header">
		<div class="container-fluid">
			<h2><?php echo $caption; ?></h2>
		</div>
	</header>
<?php endif ?>

<?php if ( $items ) : ?>
<div class="statistics active">

	<div class="col">
		<div class="tab-content">

			<div class="tab-pane active" role="tabpanel" id="tabs-first">
				<a href="#" class="btn-close"><span class="sr-only">mobile tab close</span></a>
				<div class="holder"><?php the_sub_field( 'description' ); ?></div>
			</div>

		<?php foreach ( $items as $key => $item ) : ?>
			<?php $id = "tabs-0$layout-0$key"; ?>
			<?php // echo (($key == 0) ? 'active' : '') ?>

			<div class="tab-pane" role="tabpanel" id="<?php echo $id; ?>">
				<header class="heading"><h2><?php echo $item['title']; ?></h2></header>
				<a href="#" class="btn-close"><span class="sr-only">mobile tab close</span></a>
				<div class="holder"><?php echo $item['text']; ?></div>
			</div>

		<?php endforeach ?>

		</div>
	</div>

	<ul class="nav tabset" role="tablist">
	<?php foreach ( $items as $key => $item ) : ?>
	<?php if ( $item['number'] ) : ?>
		<?php $id = "tabs-0$layout-0$key"; ?>
		<?php // echo (($key == 0) ? 'class="active"' : ''); ?>

		<li role="presentation">
			<a href="#<?php echo $id; ?>" aria-controls="<?php echo $id; ?>" role="tab" data-toggle="tab">
				<span class="small"><?php echo $item['title']; ?></span>
				<span class="value"><?php echo $item['number']; ?></span>
			</a>
		</li>

	<?php endif; ?>
	<?php endforeach ?>
	</ul>

</div><!-- / statistics -->
<?php endif ?>
