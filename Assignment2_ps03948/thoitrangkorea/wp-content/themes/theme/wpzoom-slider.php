<?php
	$args = array('showposts' => $wpzoom_featured_posts_posts, 'orderby' => 'date', 'order' => 'DESC');
	$featType = $wpzoom_featured_type;
	if ($featType == 'Tag')
	{
	$args['tag'] = "$wpzoom_featured_slug";  // Breaking tag slug
	}
	elseif ($featType == 'Category')
	{
	$args['cat'] = "$wpzoom_featured_slug";  // Breaking tag slug
	}
 
?>
 
 <div id="slider">
		
	<div id="featPostsBig">
        <div class="container">
        
		<?php 
		query_posts($args);
 		if ( have_posts() ) : ?>
		<?php $AE = new AutoEmbed(); // loading the AutoEmbed PHP Class ?>
              
		<ul class="slides">
            <?php while (have_posts()) : the_post(); update_post_caches($posts); 
            unset($videocode);
            $videocode = get_post_meta($post->ID, 'wpzoom_post_embed_code', true);
            ?>
            <li>

				<?php
				if ($videocode && $AE->parseUrl($videocode)) {
					$AE->setParam('wmode','transparent');
					$AE->setParam('autoplay','false');
					$AE->setHeight(450);
					$AE->setWidth(720);

					?><div class="cover"><?php echo $AE->getEmbedCode(); ?></div><?php 
				} else {
				?>
 
				<?php unset($img);
					if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail() ) {
					$thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
					$img = $thumbURL[0]; }
					else {
						unset($img);
						if ($wpzoom_cf_use == 'Yes') { $img = get_post_meta($post->ID, $wpzoom_cf_photo, true); }
					else {
						if (!$img)  { $img = catch_that_image($post->ID); } }
					}
					if ($img) { $img = wpzoom_wpmu($img);?>
					<div class="cover"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $img ?>&amp;h=450&amp;w=720&amp;zc=1" alt="<?php the_title(); ?>" width="720" height="450" /></a></div>
					<div class="postcontent">
						<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php wpe_excerpt('excerpt_home', 'wpe_excerptmore'); ?>
					</div>
				<?php } // if an image exists
				} // if a video does not exist ?>
				 
			</li>
			<?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <div class="cleaner">&nbsp;</div>
		</div><!-- end .container -->
 
	</div><!-- end #featPostsBig -->
      
	<?php 
	query_posts($args);
 	if ( have_posts() ) : ?>
	<div id="featPostsSmall">
        <h3><?php _e('Popular Posts', 'wpzoom') ?></h3>
        <ul class="pagination">
			<?php while (have_posts()) : the_post(); update_post_caches($posts);  ?>
			<li> 
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</li> 
			<?php endwhile; ?>
        </ul>
        
	</div><!-- end #featPostsSmall -->
	
	<?php endif; ?>
	<a href="#" class="browse previous">Prev</a>
	<a href="#" class="browse next">Next</a>
	<?php wp_reset_query(); ?>

</div><!--/slider-->
  