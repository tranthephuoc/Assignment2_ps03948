<?php
/*
Template Name: Full Width
*/
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>

<?php get_header(); ?>
 		
	<div class="single fullwidth">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		 
		<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>	</h1>
		
		<div class="entry">
			<?php the_content(); ?>
		</div>
		
		<?php wp_link_pages('before=<div class="nextpage">Pages: &after=</div>'); ?>
		
		<?php edit_post_link( __('Edit this page', 'wpzoom'), '<div class="after-meta"> ', '</div>'); ?>
 	</div> <!-- /.page -->
 		
   	<?php endwhile; endif; ?>
   	<?php wp_reset_query(); ?>

<?php get_footer(); ?>