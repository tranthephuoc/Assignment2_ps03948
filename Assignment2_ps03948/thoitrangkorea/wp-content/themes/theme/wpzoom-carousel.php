<?php
	$argsc = array('showposts' => $wpzoom_carousel_posts, 'orderby' => 'date', 'order' => 'DESC');
	$carType = $wpzoom_carousel_type;
	if ($carType == 'Tag')
	{
	$argsc['tag'] = "$wpzoom_carousel_slug";  // Breaking tag slug
	}
	elseif ($carType == 'Category')
	{
	$argsc['cat'] = "$wpzoom_carousel_slug";  // Breaking tag slug
	}

?>
 
<div id="featured" class="jcarousel">

<h3><?php _e('Featured Posts', 'wpzoom') ?></h3>
	<?php query_posts($argsc); if ( have_posts() ) : ?>
		  
	<ul>
		 <?php  while (have_posts()) : the_post(); update_post_caches($posts);  ?>
		<li><?php unset($img); 
			if ( current_theme_supports( 'post-thumbnails' ) && has_post_thumbnail() ) {
			$thumbURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );
			$img = $thumbURL[0];  }
			else { 
				unset($img);
				if ($wpzoom_cf_use == 'Yes')  { $img = get_post_meta($post->ID, $wpzoom_cf_photo, true); }
			else {  
				if (!$img)  {  $img = catch_that_image($post->ID);  } }
			}
			if ($img) { $img = wpzoom_wpmu($img); ?>
			<div class="thumb"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $img ?>&amp;w=145&amp;h=145&amp;zc=1" alt="<?php the_title(); ?>" /></a></div><?php } ?>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			 
		</li><?php endwhile; ?>
	</ul><?php endif; ?>
 </div><!-- /.featured -->
 
  
<?php wp_reset_query(); ?>