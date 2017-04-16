<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="content">
<div class="archive">

	<?php if ( have_posts() ) 	the_post(); ?>

	<h3><?php printf( __( 'Articles By:  %s', 'wpzoom' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?> <?php echo get_avatar( get_the_author_id() , 60 ); ?><br />
	<small><?php the_author_meta( 'description' ); ?></small>
	
 	<div class="clear"></div>
 	</h3>
  
 
 		<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
 
		<div class="post">
		
			<?php if ($wpzoom_archive_thumb  == 'Show') { ?>
			<?php unset($img); 
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
				<div class="thumb"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo $img ?>&amp;w=<?php echo "$wpzoom_archive_thumb_width";?>&amp;h=<?php echo "$wpzoom_archive_thumb_height";?>&amp;zc=1" alt="<?php the_title(); ?>" /></a><?php if ($wpzoom_archive_comm  == 'Show') { ?><span class="bubble"><?php comments_popup_link('0', '1', '%', ' ', ' '); ?></span><?php } ?></div><?php } ?>
			<?php } ?>
			
			<span class="meta"><?php if ($wpzoom_archive_auth  == 'Show') { ?><?php the_author_posts_link(); ?><?php } ?> <?php if ($wpzoom_archive_date == 'Show') { ?>/ <?php the_time("$dateformat $timeformat"); ?><?php } ?> <?php edit_post_link( __('Edit', 'wpzoom'), ' ', ''); ?></span>
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2> 
		
			<?php wpe_excerpt('excerpt_archive', 'wpe_excerptmore'); ?>
		</div>
 	
 	
		<?php endwhile; ?>	

	<div class="navigation">
		<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
			<div class="floatleft"><?php next_posts_link( __('&larr; Older Entries', 'wpzoom') ); ?></div>
			<div class="floatright"><?php previous_posts_link( __('Newer Entries &rarr;', 'wpzoom') ); ?></div>
		<?php } ?>
	</div> 
		
	<?php wp_reset_query(); ?>
 </div> <!-- /.archive -->
</div> <!-- /#content -->
<?php get_footer(); ?>