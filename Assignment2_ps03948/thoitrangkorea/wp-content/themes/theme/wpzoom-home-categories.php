<?php
$cc = 0;
$c = 10;
while ($cc < $c)
{
$cc++;
$category = "wpzoom_featured_big_category_" . "$cc";
if ($$category != 0)
{
$cat = get_category($$category,false);
$catlink = get_category_link($$category);
$breaking_cat = "cat=".$$category;  // Breaking tag slug
wp_reset_query();
query_posts("showposts=$wpzoom_featured_big_categories_posts&$breaking_cat&order_by=post_date&order=DESC");
?>
	<div class="featured_cat">
		
		<h3><a href="<?php echo"$catlink";?>"><?php echo"$cat->name";?></a> </h3>
 	   
		<?php if ( have_posts() ) :    
		
		while (have_posts()) : the_post(); 
		
		?>
		
		<ul>
			<div class="thumb"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
			<img src="<?php bloginfo('template_directory'); ?>/scripts/timthumb.php?src=<?php echo get_post_meta($post->ID,'thumb',true); ?>&amp;w=180&amp;h=230&amp;zc=1" alt="<?php the_title(); ?>" /></a>
			</div>
		
			<div class="article">
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><span><?php echo get_post_meta($post->ID,'giá',true); ?></span></a></li>
			</div>
		</ul>
		
			
	 
			
			<?php endwhile; //  ?>
	
	
		<?php else : ?>
  
		<p class="title"><?php _e('There are no posts in this category', 'wpzoom') ?></p>
  
		<?php endif; ?>
    
    </div>
	<?php } // if category is set
          } // while categories    
	?>
 
	<?php wp_reset_query(); ?>