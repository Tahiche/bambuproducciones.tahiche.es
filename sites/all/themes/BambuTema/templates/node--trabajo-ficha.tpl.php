    <!-- LEFT SLIDER -->
	<div class="eight columns blackvertical">
	
	  <!-- New portfolio slider implementation using a single image field, since version 1.0.1 -->
	  <?php 
	  //krumo($content['field_portfolio_stripe_slider']);
	  // Render with a custom image style, in this case named 'post_avatar'
	  //render(field_view_field('user', $user, 'field_avatar', array('settings' => array('image_style' => 'post_avatar'))));
	  if (render($content['field_portfolio_stripe_slider'])) : ?>
		<div class="flexslider">
			<!-- SLIDES -->
			<ul class="slides">
				<?php if (render($content['field_portfolio_stripe_slider'])) : ?>
				  <?php print render($content['field_portfolio_stripe_slider']); ?>
				<?php endif; ?>
			</ul>
	  </div>
	  <?php endif; ?>
	  <!-- End portfolio slider -->
	  
	  
	  <div class="videos_proyecto">
      <?php if (isset($content['field_videos']) != "") : ?>
				  <?php print render($content['field_videos']); ?>
	<?php endif; ?>
      </div>
      
  </div>

  <!-- RIGHT SIDE -->
	<div class="four columns">
	
	  <?php if (!$page): ?>
	  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
		<?php endif; ?>
  
	  <div class="article_content"<?php print $content_attributes; ?>>
	    <?php
	      // Hide comments, tags, and links now so that we can render them later.
		  //krumo($content);
		  hide($content['field_portfolio_stripe_image']);
		  hide($content['field_videos']);
		  hide($content['field_detalles_ficha']);
	      hide($content['taxonomy_forums']);
	      hide($content['comments']);
	      hide($content['links']);
	      hide($content['field_portfolio_stripe_image']);
	      hide($content['field_portfolio_stripe_tags']);
	      hide($content['field_portfolio_stripe_banner']);
	      hide($content['field_portfolio_stripe_slider']);
	      hide($content['field_portfolio_stripe_slide_1']);  //legacy support only 
	      hide($content['field_portfolio_stripe_slide_2']);  //legacy support only 
	      hide($content['field_portfolio_stripe_slide_3']);  //legacy support only 
		  print "<h5 id='sidebar_title' class='upper'>".$title."</h5>";
		  
	      print render($content);
		  
		 		   
	    ?>
	  </div>
	  
	  <?php if (!$page): ?>
	  </article> <!-- /.node -->
	  <?php endif; ?>
	  
	</div>