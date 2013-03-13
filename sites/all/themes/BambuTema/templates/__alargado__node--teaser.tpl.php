<?php 
  global $root, $base_url; 
  $tags = render($content['field_portfolio_basic_tags']);
  $tags = str_replace(',', '/',$tags);
 // krumo($content);
?>
<div class="teaserblock">
  <?php  
  /* // metodo para cargar imagen a tamañlo XX
  // Load all images' properties in an array.
  $field_image_cache_items = field_get_items('node', $node, 'field_portfolio_stripe_banner');
  // Generate a renderable image array.
  $image_renderable = field_view_value('node', $node, 'field_portfolio_stripe_banner', $field_image_cache_items[0], array('settings' => array('image_style' => 'panorama_teaser_big')));
  // Output complete image.
  echo render($image_renderable);
  */
  // mas fácil
  $content['field_portfolio_stripe_banner'][0]['#image_style']="panorama_teaser_big";
  print render($content['field_portfolio_stripe_banner']); ?>
  
  <a href="<?php print $node_url;?>">
  <div class="gridinfo boxshadow">
		<h3 class="whitetext extrabold smalltoppadding center shadow"><?php print $title; ?></h3>
		<div class="whitetext center"><?php echo render($content['body']); ?></div>
		<span class="smallfont space"><?php echo t('VIEW PROJECT');?></span>
	</div>
	</a>
</div>