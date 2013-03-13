<?php 
	global $root; 
	BambuTema_header($page);
	
?>
 <?php 
print ($edit_tabs);
?>

<div id="skrollr-body" style="height:100%;overflow:hidden" data-0="height:100%" data-300="height:0%">
<!-- SLIDESHOW CONTAINER WITH STRIPES BACKGROUND. CHANGE THE BELOE BG URL TO USE YOUR OWN BACKGROUND
PLEASE REMEMBER: THE BACKGROUND HAS LOW OPACITY TO MAKE SLIDESHOW VISIBLE.-->

<div class="container slideshow"  >
	<section class="row largepadding">
	<div id="ficha_header_data" class="six columns bigpadding" data-0="opacity: 1" data-150="opacity:0" >
    
    <?php 
	// 
	if (isset($logotipo) && $logotipo != "") : ?>
		<!-- SLIDESHOW CAPTION -->
        <div class="whitetext"  >
		<?php 
		// print render(field_view_field('node', $node, 'field_logotipo', array('settings' => array('image_style' => 'large'))));
		// in template preprocess
		print $logotipo;
		//print render($node->field_logotipo)?>
        </div>
        
    <?php else: ?>
     <h1 class="whitetext shadow"  ><?php echo $title; ?></h1>
    <?php endif; ?>
    
    
        
        <?php if (isset($node->field_detalles_ficha) != "") : ?>
<div id="ficha_tec" class="whitetext meta">
 <?php  
 //krumo($detalles_ficha);  
 //print render(field_view_field('node', $node, 'field_detalles_ficha','default'));
 
 print $detalles_ficha;
  ?>  
</div>
<?php endif; ?>

		<?php //echo theme_get_setting('slider_caption');?>	</div>
        
<?php if (isset($texto_promo) && $texto_promo != "") : //texto_promo in preprocess page ?>
<div id="ficha_texto_promo" class="six columns bigpadding whitetext shadow" data-0="opacity: 1" data-150="opacity:0" >
<span class="whitetext" style="display:block">
<?php  print $texto_promo; ?>  
</span>
</div>
<?php endif; ?>
	</section>
</div>
<!-- END SLIDESHOW CONTAINER -->
</div> <!-- fin skrollrk body -->

<div class="black_separa"></div>
 
<?php print render($page['help']); ?>
<?php if ($action_links): ?>
  <ul class="action-links">
    <?php print render($action_links); ?>
  </ul>
<?php endif; ?>

<div class="container white bigpadding trabajocontent content" <?php print $content_attributes; ?> >

  <section class="row">   


	  <?php  print render($title_prefix); ?>
	  <?php print render($title_suffix); ?>
	  <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      
      
       
	  <?php print render($page['content']); ?>
	  
  </section>
</div>


<?php if (isset($node->field_portfolio_stripe_banner['und'][0]) != "") : ?>
<script src="<?php echo $root;?>/js/supersized.js"></script>



<div id="supersized"></div>

<script type="text/javascript">
jQuery(document).ready(function ($) {
   // alert("ready");
  $.supersized({
				
		// Functionality
		slideshow               :   0,			// Slideshow on/off
		autoplay				:	1,			// Slideshow starts playing automatically
		start_slide             :   1,			// Start slide (0 is random)
		stop_loop				:	0,			// Pauses slideshow on last slide
		random					: 	0,			// Randomize slide order (Ignores start slide)
		slide_interval          :   7000,		// Length between transitions
		transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
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
       	{image : '<?php 
		print image_style_url('big_banner',  $node->field_portfolio_stripe_banner['und'][0]['uri']);
		//echo file_create_url($node->field_portfolio_stripe_banner['und'][0]['uri']); ?>'},
		],
									
		// Theme Options			   
		progress_bar			:	1,			// Timer for each slide							
		mouse_scrub				:	0
		
	});
});

</script>

<?php endif; ?>


      
<?php BambuTema_footer($page);?>