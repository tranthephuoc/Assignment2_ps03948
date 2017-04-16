<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
$template = get_post_meta($post->ID, 'wpzoom_post_template', true);
 if ($template == 'Full Width (no sidebar)') {$fullwidth = 1; }
?>

<?php get_header(); ?>
<div class="main">
<?php if (!$fullwidth) { get_sidebar(); } ?>
<div id="content">
	<div class="single<?php if ($fullwidth) {echo' fullwidth';} ?>">
	<p class="brem"><a class="home"href="<?php bloginfo('home');?>"></a> <span><?php the_category(', '); ?> </span><span><?php the_title();?></span></p>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="sp">
			 <div class="img">
				<img src="<?php echo get_post_meta($post->ID,'thumb',true);?>" title="<?php the_title();?>" alt="<?php the_title();?>"/>
			 </div>
			 <ul>
				<li><a>Tên sản phẩm:</a> <h1><span><?php the_title();?></span></h1></li>
				<li><a>Hãng sản xuất:</a> <span><?php echo get_post_meta($post->ID,'xuất_sứ',true);?></span></li>
				<li><a>Màu sắc:</a> <span><?php echo get_post_meta($post->ID,'màu_sắc',true);?></span></li>
				<li><a>Kích cỡ:</a> <span><?php echo get_post_meta($post->ID,'kích_cỡ',true);?></span></li>
				<li><a>Giá:</a> <span class="red"><?php echo get_post_meta($post->ID,'giá',true);?></span></li>
				<li><a>Tình trạng:</a> <span class="redd"><?php echo get_post_meta($post->ID,'tình_trạng',true);?></span></li>
			 </ul>
			</div>
			<div class="entry" id="entry"><h3>Thông tin sản phẩm</h3>
 				<li><?php the_content(); ?></li>
   			</div>
			
			 
		
			
			<div class="after-meta">
				<div class="tags_list"><?php the_tags('Tags: ', ' ', ''); ?></div>
				
				<?php if ($wpzoom_singlepost_social == 'Show') { ?>	
				<ul>
					<li><?php _e('Share this post: ', 'wpzoom') ?></li>
					<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" rel="external,nofollow" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/small/facebook.png" alt="Facebook" /></a></li>
					<li><a href="http://twitter.com/home?status=Reading on <?php bloginfo('name') ?> - <?php the_title(); ?> <?php the_permalink(); ?>" rel="external,nofollow" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/small/twitter.png" alt="Twitter" /></a></li>
					<li><a href="http://del.icio.us/post?url=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>" rel="external,nofollow" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/small/delicious.png" alt="Delicious" /></a></li>
					<li><a href="http://digg.com/submit?phase=2&url=<?php the_permalink();?>&title=<?php the_title();?>" rel="external,nofollow" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/small/digg.png" alt="Digg" /></a></li>
				</ul> 
				<?php } ?>
			</div>
			
			
 
 
	
   	<?php endwhile; endif; wp_reset_query(); ?>
  </div> <!-- /.post --></div>
  </div>
<?php get_footer(); ?>