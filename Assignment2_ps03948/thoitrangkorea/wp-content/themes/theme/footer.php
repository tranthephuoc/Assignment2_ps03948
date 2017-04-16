<?php
 global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
	<div class="clear"></div>
	<div id="footer">
		 
				<?php wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => 'topmenu', 'sort_column' => 'menu_order', 'theme_location' => 'secondary' ) ); ?>
				
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : ?>
		<?php endif; ?>
		
		<div class="clear"></div>

		

	</div> <!-- /#footer -->
 
</div> <!-- /#page-wrap-->

<?php if ($wpzoom_misc_analytics != '' && $wpzoom_misc_analytics_select == 'Yes')
{
  echo stripslashes($wpzoom_misc_analytics);
} ?> 
 

<script type="text/javascript">
function mycarousel_initCallback(carousel)
{ 
};

jQuery(document).ready(function() {
    jQuery('#featured').jcarousel({
		wrap: 'last',
        visible: 6,
        scroll: 1,
		wrap: 'both',
        initCallback: mycarousel_initCallback
    });
});
</script>


<script type="text/javascript" charset="utf-8">
jQuery(document).ready(
function($)
{
		$('#slider').loopedSlider({
			autoHeight: true,
			containerClick: false,
			slidespeed: 300,
			fadespeed: 100,
 			addPagination: true, 
 			pauseOnHover: <?php if ($wpzoom_slideshow_pause == 'Yes') { ?>true<?php } ?> <?php if ($wpzoom_slideshow_pause == 'No') { ?>false<?php } ?>,
   			autoStart: <?php if ($wpzoom_slideshow_auto == 'Yes') { ?><?php echo "$wpzoom_slideshow_speed"; ?><?php } ?> <?php if ($wpzoom_slideshow_auto == 'No') { ?>0<?php } ?>
 		});
	});
</script>

 
</body>
</html>