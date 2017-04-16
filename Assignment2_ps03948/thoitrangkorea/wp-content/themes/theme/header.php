<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<title><?php wpzoom_titles(); ?></title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="description" content="<?php the_excerpt_rss(); ?>" />
<?php meta_post_keywords(); ?>
<?php endwhile; endif; elseif(is_home()) : ?>
<meta name="description" content="<?php if (strlen($wpzoom_meta_desc) < 1) { bloginfo('description');} else {echo"$wpzoom_meta_desc";}?>" />
<?php meta_home_keywords(); ?>
<?php endif; ?>
<?php wpzoom_index(); ?>
<?php wpzoom_canonical(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/dropdown.css" type="text/css" media="screen" />
<?php if (strlen($wpzoom_misc_favicon) > 1 ) { ?><link rel="shortcut icon" href="<?php echo "$wpzoom_misc_favicon";?>" type="image/x-icon" /><?php } ?> 
<?php wp_head(); ?>
<?php wpzoom_js("jcarousel",  "script", "dropdown", "loopedslider", "tabber-minimized" ); ?>

</head>

<body>
 
	

		<div id="header">
<div class="header"><div id="logo">
				<a href="<?php echo get_option('home'); ?>/">
					<?php if (strlen($wpzoom_misc_logo_path) > 1) { ?>
						<img src="<?php echo "$wpzoom_misc_logo_path";?>" alt="<?php bloginfo('name'); ?>" />
					<?php } else { ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /><?php } ?>
				</a>
 
			</div>
			
			<div class="adv">
				<?php if (strlen($wpzoom_ad_head_imgpath) > 1 && $wpzoom_ad_head_select == 'Yes') {?>
					 <?php if (strlen($wpzoom_ad_head_imgpath) > 1) { echo stripslashes($wpzoom_ad_head_imgpath); }?> 
				<?php } ?>
			</div>
			
			<?php if ($wpzoom_search_form  == 'Yes') { ?>
			<div id="search_form">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</div>
			<?php } ?>
			<div class="clear"></div>
 
		
			<!-- Main Menu -->
			
</div>
 		</div><!-- /header -->
		<div id="menu" class="dropdown">
 					<?php wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => 'mainmenu', 'sort_column' => 'menu_order', 'theme_location' => 'primary' ) ); ?>
 						
  			</div><!-- /menu -->
		<div id="page-wrap">