<?php
/**
 * Template part for Two columns layout 
 */

?>

<div class="fund-info">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6">
				<?php the_sub_field('first_column'); ?>
			</div>
			<div class="col-xs-6">
				<?php the_sub_field('second_column'); ?>
			</div>
		</div><!-- / row -->
	</div><!-- / container-fluid -->
</div><!-- / fund-info -->
