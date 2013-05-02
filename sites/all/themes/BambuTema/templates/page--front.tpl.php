<?php BambuTema_header($page); // Call Header ?>

<?php
  global $root; 
  $slide_number = theme_get_setting('slides_number');
?>
<?php
if (theme_get_setting('enable_slider') == '1') : ?>
<div id="skrollr-body" style="height:100%;overflow:hidden" data-0="height:100%" data-300="height:0%">
<!-- SLIDESHOW CONTAINER WITH STRIPES BACKGROUND. CHANGE THE BELOE BG URL TO USE YOUR OWN BACKGROUND
PLEASE REMEMBER: THE BACKGROUND HAS LOW OPACITY TO MAKE SLIDESHOW VISIBLE.-->
<div class="container slideshow" >
	<section class="row largepadding">
	<div class="six columns bigpadding"  data-0="opacity: 1" data-150="opacity:0" >
    <!-- <h1 class="whitetext shadow"><?php echo $title; ?></h1> -->
    
    <div><img src='<?php echo $root."/img/logoHome.png";?>'  /></div>
		<!-- SLIDESHOW CAPTION -->
		<?php 
		echo render($node_content['body']);
		//echo theme_get_setting('slider_caption');?>	</div>
	</section>
</div>

</div>
<!-- END SLIDESHOW CONTAINER -->	
<?php endif; ?>

<?php 
print ($edit_tabs);
?>


<?php print render($page['help']); ?>
<?php //krumo ($node_content); ?>
<?php //krumo ($node); ?>
<?php //krumo ($page); ?>
<!-- THICK STRIPE BORDER -->
<!-- THICK STRIPE BORDER -->
<div class="smallpadding white"  >
</div>

<div class="container black bigpadding">
<section class="row smallbottompadding">
<h3 class="whitetext  midbottommargin center"><?php echo t('Proyectos Destacados');?></h3>
<?php  
echo render($node_content['field_destacados']);
//print  render($page['content']);  ?>   
</section>
</div>


<div class="smallpadding"></div>

<!-- PORTFOLIO CONTAINER -->
<div class="container white bigpadding topblack">
	<section class="row smallbottompadding">
	<h3 class="blacktext  midbottommargin center"><?php echo t("Noticias");?></h3>
	<!-- BLACKHORIZONTAL -->
	<div class="three columns alpha centered blackhorizontal">
	</div>
	<div class="four columns centered smalltoppadding">

	</div>
	</section>
	<!-- BASIC PORTFOLIO ITEM ROW -->
	<section class="row midbottompadding recent_projects center">
	<?php  print render($page['front_blog']);  ?>

	</section>
</div>
<!-- end of  portfolio container -->    

<div class="smallpadding"></div>

<script src="<?php echo $root;?>/js/supersized.js"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {
    
  $.supersized({
				
		// Functionality
		slideshow               :   1,			// Slideshow on/off
		autoplay				:	1,			// Slideshow starts playing automatically
		start_slide             :   1,			// Start slide (0 is random)
		stop_loop				:	0,			// Pauses slideshow on last slide
		random					: 	1,			// Randomize slide order (Ignores start slide)
		slide_interval          :   7000,		// Length between transitions
		transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
		transition_speed		:	1000,		// Speed of transition
		new_window				:	1,			// Image links open in new window/tab
		pause_hover             :   0,			// Pause slideshow on hover
		keyboard_nav            :   1,			// Keyboard navigation on/off
		performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
		image_protect			:	1,			// Disables image dragging and right click with Javascript
												   
		// Size & Position						   
		min_width		        :   0,			// Min width allowed (in pixels)
		min_height		        :   0,			// Min height allowed (in pixels)
		vertical_center         :   1,			// Vertically center background
		horizontal_center       :   1,			// Horizontally center background
		fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
		fit_portrait         	:   1,			// Portrait images will not exceed browser height
		fit_landscape			:   0,			// Landscape images will not exceed browser width
												   
		// Components							
		slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
		thumb_links				:	1,			// Individual thumb links for each slide
		thumbnail_navigation    :  0,			// Thumbnail navigation
	  slides :  	
	  	[	// Slideshow Images
        <?php 
		$i=1;
		foreach ($node->field_portfolio_basic_banner['und'] as $id=>$img) {?>
				{image : '<?php 
				print image_style_url('big_banner',  $img['uri']);
				//print file_create_url($img['uri']); ?>'},
				<?php  } ?>
			],
									
		// Theme Options			   
		progress_bar			:	1,			// Timer for each slide							
		mouse_scrub				:	0
		
	});
});

</script>


<?php BambuTema_footer($page); // Call Footer ?>