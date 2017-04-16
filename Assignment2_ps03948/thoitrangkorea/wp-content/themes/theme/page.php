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
	<div class="single">
	<p class="brem"><a class="home"href="<?php bloginfo('home');?>"></a><span><?php the_title();?></span></p>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		 
		<h1><?php the_title(); ?></h1>
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
		
		<?php wp_link_pages('before=<div class="nextpage">Pages: &after=</div>'); ?>
		
		<?php edit_post_link( __('Edit this page', 'wpzoom'), '<div class="after-meta"> ', '</div>'); ?>
 		
  	</div> <!-- /.single -->
  		
	<?php endwhile; endif; ?>
   	<?php wp_reset_query(); ?>
	</div>
</div>
<?php get_footer(); ?>