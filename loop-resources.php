
<?php query_posts('post_type=resources&order=ASC'); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="resources-item">

      <div class="bootstrap-wrapper beefup">
        <div class="row">
          <div class="number-column tc">
            <p><?php echo get_post_meta ($post->ID,'incr_number',true); ?></p>
          </div>
          <div class="title-column tl ttu fw6 beefup__head">
            <p><?php the_title(); ?></p>
            <span class="arrow-down"><?php include( get_template_directory() . '/assets/images/caret.svg'); ?></span>
          </div>
          <div class="weight-column col-1 tc">
            <p><?php the_field('file_weight'); ?></p>
          </div>
          <a href="<?php the_field('file_url'); ?>" class="download-column col-1 tc">
          </a>
        </div>
        <div class="beefup__body">
          <div class="bootstrap-wrapper">
            <div class="row">
              <div class="beefup__left-col" style="background: url('<?php the_field('featured_image'); ?>') center no-repeat; background-size: cover;"></div>
              <div class="beefup__right-col">
                <div class="cf">
                  <div class="fl w-100 w-50-ns">
                    <?php the_field('content_left'); ?>
                  </div>
                  <div class="fl w-100 w-50-ns pl0 pl0-m pl5-ns">
                    <?php the_field('content_right'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php endif; ?>
