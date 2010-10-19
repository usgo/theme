<h1><?php bloginfo('name'); ?><?php wp_title(' &raquo; ', true, 'left'); ?></h1>
<?php
global $query_string;
query_posts($query_string . "&cat=-1182");
if (have_posts()) : while (have_posts()) : the_post(); ?>
<div <?php post_class('containfloats') ?> id="post-<?php the_ID(); ?>">
	 <h2 class="storytitle"><?php the_title(); ?></h2>
     <p class="date"><?php the_time('l F j'); ?></p>
	<div class="storycontent">
		<?php the_content(__('Continue reading...)')); ?>
	</div>
    <div class="meta containfloats">
        <div class="categories">
            <?php _e("Categories:"); ?> <?php the_category(',') ?>
        </div>
        <div class="edit">
            <?php edit_post_link(__('Edit This Post')); ?>
        </div>
        <div class="tags">
            <?php the_tags(__('Tags: '), ', ', ''); ?>
        </div>
    </div>
</div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<div class="wp_nav">
<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
</div>
