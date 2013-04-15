<?php 
  global $root, $base_url; 
  $tags = render($content['field_portfolio_basic_tags']);
  $tags = str_replace(',', '/',$tags);
 // krumo($content);
?>

<div class="newsgridblock">
  <?php 
   
   //print 
   
   if(isset($content['field_portfolio_stripe_image'][0]) ){
	   //$content['field_portfolio_basic_image'][0]['#image_style']="teaser_list_img";
	    print render($content['field_portfolio_stripe_image']); 
   }
  
    else if(isset($content['field_portfolio_stripe_banner']) ){ 
	//$content['field_portfolio_stripe_banner'][0]['#image_style']="teaser_list_img";
	print render($content['field_portfolio_stripe_banner']); 
	}
   else{
	   print render($content['field_image']);
	   }
  // print render($content['field_portfolio_stripe_banner']);
  //<a href="<?php print $node_url;">
  ?>
  
  <div class="newsgridinfo">
		<h5 class="blacktext smalltoppadding center"><?php echo render($content['title_field']) ?></h5>
		<div  class="newsteaserbody greytext center smallfont"><?php 
		$teaserT= strip_tags($content['body'][0]['#markup'], '<b> <a> <strong> <br>')."...";
		
		echo render( $teaserT ); ?></div>
		
	</div>
	
</div>