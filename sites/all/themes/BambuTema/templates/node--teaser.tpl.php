<?php 
  global $root, $base_url; 
  $tags = render($content['field_portfolio_basic_tags']);
  $tags = str_replace(',', '/',$tags);
  // krumo($content);
?>

<div class="gridblock">
  <?php 
   
   //print 
   
   if(isset($content['field_portfolio_stripe_image'][0]) ){
	   //$content['field_portfolio_basic_image'][0]['#image_style']="teaser_list_img";
	    print render($content['field_portfolio_stripe_image']); 
   }
  
    else{ 
	//$content['field_portfolio_stripe_banner'][0]['#image_style']="teaser_list_img";
	print render($content['field_portfolio_stripe_banner']);
	}
   
  // print render($content['field_portfolio_stripe_banner']);
  ?>
  <a href="<?php print $node_url;?>">
  <div class="gridinfo">
		<h3 class="whitetext extrabold smalltoppadding center"><?php print $title; ?></h3>
		<h5 class="whitetext center"><?php echo $tags; // echo render($content['body']); ?></h5>
		<span class="smallfont space"><?php echo t('VER PROYECTO');?></span>
	</div>
	</a>
</div>