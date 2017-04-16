<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php get_header(); ?>
<div class="main">
<?php get_sidebar(); ?>

<div id="content">
	<div class="archive">
		<p class="brem"><a class="home"href="<?php bloginfo('home');?>">  </a> <span><?php single_cat_title(); ?> </span></p>
	<h1><a>
		<?php /* category archive */ if (is_category()) { ?> <?php single_cat_title(); ?>
		<?php /* tag archive */ } elseif( is_tag() ) { ?>  Tag "<?php single_tag_title(); ?>"
		<?php /* daily archive */ } elseif (is_day()) { ?> <?php the_time('F jS, Y'); ?>
		<?php /* monthly archive */ } elseif (is_month()) { ?> <?php the_time('F, Y'); ?>
		<?php /* yearly archive */ } elseif (is_year()) { ?><?php the_time('Y'); ?>
		<?php /* author archive */ } elseif (is_author()) { ?><?php /* paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<?php _e('Archives', 'wpzoom'); ?><?php } ?>
	</a></h1>
 
 	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	
	
		<ul>
			<div class="thumb"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo get_post_meta($post->ID,'thumb',true); ?>&amp;w=180&amp;h=230&amp;zc=1" alt="<?php the_title(); ?>" /></a>
			</div>
		
			<div class="article">
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><span><?php echo get_post_meta($post->ID,'giá',true); ?></span></a></li>
			</div>
		</ul>
		
	
	<?php endwhile; ?>
 		
	<div class="navigation">
		<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
			<div class="floatleft"><?php next_posts_link( __('&larr; Older Entries', 'wpzoom') ); ?></div>
			<div class="floatright"><?php previous_posts_link( __('Newer Entries &rarr;', 'wpzoom') ); ?></div>
		<?php } ?>
	</div> 
 
 	
   	<?php endif; ?>
   	<?php wp_reset_query(); ?>
	</div> <!-- /archive -->
	
</div> <!-- /.content -->
</div>
<?php get_footer(); ?>